<?php

namespace App\Http;

use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class HttpHandler extends HttpHandlerAbstract
{
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

        try {
            $userService->register($user, $formData['confirm_password']);
            $this->redirect('login.php');
        } catch (\Exception $e) {
            $this->render('users/register', null, [$e->getMessage()]);
        }
    }

    private function handleLoginProcess(UserServiceInterface $userService, array $formData): void
    {

        try {
            $currentUser = $userService->login($formData['username'], $formData['password']);
            $_SESSION['id'] = $currentUser->getId();
            $this->redirect('dashboard.php');
        } catch (\Exception $e) {
            // when user enter wrong username or password stays on login page
            $this->render('users/login', null, [$e->getMessage()]);
        }
    }
}
