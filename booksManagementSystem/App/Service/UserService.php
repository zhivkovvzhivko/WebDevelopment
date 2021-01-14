<?php

namespace App\Service;

use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserDTO $userDTO, string $confirmPassword)
    {
        if ($userDTO->getPassword() !== $confirmPassword) {
            return false;
        }

        if ($this->userRepository->findOneByEmail($userDTO->getEmail() !== null)) {
            return false;
        }

        $this->encryptPassword($userDTO);

        return $this->userRepository->insert($userDTO);
    }

    public function login(string $email, string $password): ?UserDTO
    {
        $currentUser = $this->userRepository->findOneByEmail($email);

        if ($currentUser === null) {
            return null;
        }

        if (false === password_verify($password, $currentUser->getPassword())) {
            return null;
        }

        return $currentUser;
    }

    public function currentUser(): ?UserDTO
    {
        if (!isset($_SESSION['id'])) {
            return null;
        }

        return $this->userRepository->findOneById($_SESSION['id']);
    }

    public function edit(UserDTO $userDTO): bool
    {
        $currentUser = $this->userRepository->findOneByEmail($userDTO->getEmail());

        if ($currentUser == null) {
            return false;
        }

        $this->encryptPassword($userDTO);
        return $this->userRepository->update($userDTO, $_SESSION['id']);
    }

    /**
     * @param UserDTO $userDTO
     */
    private function encryptPassword(UserDTO $userDTO): void
    {
        $plainText = $userDTO->getPassword();
        $passwordHash = password_hash($plainText, PASSWORD_DEFAULT);
        $userDTO->setPassword($passwordHash);
    }

    public function all(): \Generator
    {
        return $this->userRepository->findAll();
    }

    public function isLogged(): bool
    {
        if ($this->currentUser() === null) {
            return false;
        }

        return true;
    }

    public function getRoleId($userId): int
    {
        return $this->userRepository->findRoleById($userId);
    }

    public function getNotApproveUsers(): ?\Generator
    {
        return $this->userRepository->findNotApprovedUsers();
    }

    public function approveUser(int $userId, $val = 0): bool
    {
        return $this->userRepository->approveUser($userId, $val);

    }

    public function isAdmin(): bool
    {
        return $this->userRepository->isAdmin(intval($_SESSION['id']));
    }
}
