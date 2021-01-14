<?php

namespace App\Service;

use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword);
    public function login(string $email, string $password): ?UserDTO;
    public function currentUser(): ?UserDTO;
    public function edit(UserDTO $userDTO): bool;

    /**
     * @return \Generator|UserDTO[]
     */
    public function all(): \Generator;
    public function isLogged(): bool;

    public function getRoleId($userId): int;

    public function getNotApproveUsers(): ?\Generator;
    public function approveUser(int $userId, $val = 0): bool;
    public function isAdmin(): bool;
}