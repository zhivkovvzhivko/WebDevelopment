<?php

namespace App\Repository;

use Database\DatabaseInterface;

class UsersRolesRepository implements UsersRolesRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert($user_id, $role_id = 2): bool
    {
        $this->db->query("
            INSERT INTO users_roles (user_id, role_id) VALUES (?, ?)
        ")->execute([$user_id, $role_id]);

        return true;
    }

    public function findOneUserRole($user_id, $role_id = 2): bool
    {
        $this->db->query("
            SELECT *
            FROM users_roles
            WHERE user_id = ? AND role_id = ?
        ")->execute([$user_id, $role_id]);

        return true;
    }
}