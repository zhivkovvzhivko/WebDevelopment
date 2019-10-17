<?php

namespace App\Service;

use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword) : bool;
}