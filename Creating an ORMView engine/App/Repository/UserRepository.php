<?php

namespace App\Repository;

use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
    /*
     * @var DatabaseInterface
     */
    private $db;

    /**
     * UserRepository constructor.
     * @param $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(UserDTO $userDTO): bool
    {
        $this->db->query("
            INSERT INTO users(username, password, first_name, last_name, born_on) 
            VALUES (?, ?, ?, ?, ?)
        ")->execute([
            $userDTO->getUsername(),
            $userDTO->getPassword(),
            $userDTO->getFirstName(),
            $userDTO->getLastName(),
            $userDTO->getBornOn()
        ]);

        return true;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
        return $this->db->query("
            SELECT username, password, first_name, last_name, born_on
            FROM users
            WHERE username = ?
        ")->execute([$username])
            ->fetch(UserDTO::class)
            ->current();
    }
}
