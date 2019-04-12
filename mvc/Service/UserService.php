<?php

namespace Service;

use Repository\UserRepository;

class UserService
{
    /**
     * @var UserRepository
     */
    private $user_repo;


    /**
     * UserService constructor.
     */
    public function __construct(UserRepository $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    public function register(\Model\UserRegisterFormModel $user_model)
    {
        $this->user_repo->insert($user_model);
    }
}
