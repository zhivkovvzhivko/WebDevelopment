<?php

namespace App\Repository;

use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO): int;
    public function findOneByEmail(string $email): ?UserDTO;
    public function findOneById($id): ?UserDTO;
    public function update(UserDTO $userDTO, int $id): bool;

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll(): \Generator;

    public function findRoleById($userId): int;

    public function findNotApprovedUsers(): ?\Generator;

    public function approveUser(int $userId, $val = 0): bool;

    public function isAdmin($userId): bool;
}
