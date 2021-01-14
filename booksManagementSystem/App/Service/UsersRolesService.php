<?php

namespace App\Service;

use App\Repository\UsersRolesRepositoryInterface;

class UsersRolesService implements UsersRolesServiceInterface
{
    /**
     * @var UsersRolesRepositoryInterface
     */
    private $db;

    public function __construct(UsersRolesRepositoryInterface $db)
    {
        $this->db = $db;
    }

    public function add(int $user_id, int $role_id): bool
    {
//        echo '<pre/>'; var_dump([
//            'user'=> $user_id,
//            'role' => $role_id
//        ]); die(' ob6ta service');
        $this->db->insert($user_id, $role_id);

        return true;
    }
}
