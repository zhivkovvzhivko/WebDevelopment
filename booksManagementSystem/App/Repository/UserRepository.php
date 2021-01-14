<?php

namespace App\Repository;

use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(UserDTO $userDTO): int
    {
        $this->db->query("
            INSERT INTO users (first_name, last_name, email, password, active)
            VALUES (?,?,?,?,?)
        ")
        ->execute([
            $userDTO->getFirstName(),
            $userDTO->getLastName(),
            $userDTO->getEmail(),
            $userDTO->getPassword(),
            $userDTO->getActive()
        ]);

        return $this->db->getLastId();
    }

    public function findOneByEmail(string $email): ?UserDTO
    {
        return $this->db->query("
            SELECT id, first_name AS firstName, last_name AS lastName, email, password, active
            FROM users
            WHERE email = ?
        ")
            ->execute([$email])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findOneById($id): ?UserDTO
    {
        return $this->db->query("
            SELECT id, first_name AS firstName, last_name AS lastName, email, password, active
            FROM users
            WHERE id = ?
        ")->execute([$id])
        ->fetch(UserDTO::class)
        ->current();
    }

    public function update(UserDTO $userDTO, int $id): bool
    {
         $this->db->query("
            UPDATE users
            SET 
                first_name = ?,
                last_name = ?,
                email = ?,
                password = ?,
                active = ?
            WHERE id = ? 
        ")->execute([
            $userDTO->getFirstName(),
             $userDTO->getLastName(),
             $userDTO->getEmail(),
             $userDTO->getPassword(),
             $userDTO->getActive(),
             $id
         ]);

         return true;
    }

    public function findAll(): \Generator
    {
        return $this->db->query("
            SELECT id, first_name AS firstName, last_name AS lastName, email, password, active
            FROM users
        ")->execute()
            ->fetch(UserDTO::class);
    }

    public function findRoleById($userId): int
    {

        $data = $this->db->query('
            SELECT 
                ur.role_id
            FROM 
                users AS u 
            LEFT JOIN users_roles AS ur ON u.id = ur.user_id
            WHERE u.id = ?
        ')->execute([$userId])
            ->fetch()
        ->current();

        return $data['role_id'];
    }

    public function findNotApprovedUsers(): ?\Generator
    {
        return $this->db->query("
            SELECT *
            FROM users
            WHERE active = 0
        ")->execute()->fetch();
    }

    public function approveUser(int $userId, $val = 0): bool
    {
        $this->db->query("
            UPDATE users AS u 
            SET active = ?
            WHERE u.id = ?
        ")->execute([$val, $userId]);

        return true;
    }

    public function isAdmin($userId): bool
    {
        $data = $this->db->query("
            SELECT 
                r.role_name
            FROM 
                roles AS r 
            JOIN users_roles AS ur ON r.id = ur.role_id 
            WHERE
            ur.user_id = ?
        ")->execute([$userId])->fetch();

        foreach ($data as $roles){
            return in_array('ADMIN', $roles) ? true : false;
        }
    }
}
