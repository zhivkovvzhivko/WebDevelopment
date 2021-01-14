<?php

namespace App\Repository;

interface UsersRolesRepositoryInterface
{
    public function insert($user_id, $role_id = 2): bool;
    public function findOneUserRole($user_id, $role_id = 2): bool;
}