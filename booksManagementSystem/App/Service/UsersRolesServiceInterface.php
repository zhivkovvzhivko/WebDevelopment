<?php

namespace App\Service;

interface UsersRolesServiceInterface
{
    public function add(int $user_id, int $role_id): bool;
}