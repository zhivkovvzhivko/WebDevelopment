<?php

namespace App\Http;

use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class HttpHandler extends HttpHandlerAbstract
{
//    public function index()
//    {
//        $this->render('home/index');
//    }

    public function allUsers(UserServiceInterface $userService)
    {
        $this->render('users/all', $userService->all());
    }

    public function login(UserServiceInterface $userService, array $formData = [])
    {
        if (isset($formData['login'])) {
            $this->handleLoginProcess($userService, $formData);
        } else{
            $this->render('users/login');
        }
    }

    public function register(UserServiceInterface $userService, array $formData = [])
    {
        if (isset($formData['register'])) {
            $this->handleRegisterProcess($userService, $formData);
        } else {
            $this->render('users/register');
        }
    }

    /**
     * @param UserServiceInterface $userService
     * @param array $formData
     */
    private function handleRegisterProcess(UserServiceInterface $userService, array $formData): void
    {
        $user = $this->dataBinder->bind($formData, UserDTO::class);

        if ($userService->register($user, $formData['confirm_password'])) {
            $this->redirect('login.php');
        } else {
            $this->render('app/error', new ErrorDTO('Username is already taken or password mismatch.'));
        }
    }

    private function handleLoginProcess(UserServiceInterface $userService, array $formData): void
    {
        $currentUser = $userService->login($formData['username'], $formData['password']);

        if ($currentUser !== null) {
            $_SESSION['id'] = $currentUser->getId();
            $this->redirect('dashboard.php');
        } else {
            $this->render('app/error', new ErrorDTO('Username does not exist or password mismatch.'));
        }
    }
}
