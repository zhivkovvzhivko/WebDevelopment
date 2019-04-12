<?php

namespace Controller;

use Core\View\View;
use Core\View\ViewInterface;
use Model\UserProfileViewModel;
use Model\UserRegisterFormModel;
use Service\UserService;

class UsersController
{
    /**
     * @var View
     */
    private $view;

    /**
     * UsersController constructor.
     * @param ViewInterface $view
     */
    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function profile(string $first_name, string $last_name){
        $model = new UserProfileViewModel($first_name, $last_name);
        $this->view->render($model);
    }

    public function register(){
        $this->view->render();
    }

    public function registerSave(UserRegisterFormModel $user_model, UserService $user_service){
        $user_model->register($user_service);
    }
}