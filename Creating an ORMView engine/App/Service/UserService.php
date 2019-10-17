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

    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if ($userDTO->getPassword() != $confirmPassword) {
            return false;
        }

        // Checks(select) if username exists in DB already (!== null) - breaks. If NOT exists continue to insert new user.
        if ($this->userRepository->findOneByUsername($userDTO->getFirstName()) !== null) {
            return false;
        }

        $plainText = $userDTO->getPassword();
        $passwordHash = password_hash($plainText, PASSWORD_DEFAULT);
        $userDTO->setPassword($passwordHash);

        return $this->userRepository->insert($userDTO);
    }
}