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
            throw new \Exception('Confirm password does not match.');
        }

        // Checks(select) if username exists in DB already (!== null) - breaks. If NOT exists continue to insert new user.
        if ($this->userRepository->findOneByUsername($userDTO->getUsername()) !== null) {
            throw new \Exception('Username is already taken.');
        }

        $this->encryptPassword($userDTO);

        return $this->userRepository->insert($userDTO);
    }

    public function login(string $username, string $password): ?UserDTO
    {
        $currentUser = $this->userRepository->findOneByUsername($username);

        if ($currentUser === null) {
            throw new \Exception("Username not found");
        }

        $userPasswordHash =  $currentUser->getPassword();

        if (false === password_verify($password, $userPasswordHash)) {
            throw new \Exception("Invalid password");
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
        $this->encryptPassword($userDTO);
        return $this->userRepository->update($_SESSION['id'], $userDTO);
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

    /**
     * @return \Generator|UserDTO[]
     */
    public function all(): \Generator
    {
        return $this->userRepository->findAll();
    }

    public function isLogged() : bool
    {
        if ($this->currentUser() === null) {
            return false;
        }

        return true;
    }
}