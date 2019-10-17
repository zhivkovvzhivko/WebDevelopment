<?php

namespace App\Http;

use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class HttpHandler extends HttpHandlerAbstract
{
    public function register(UserServiceInterface $userService, array $formData = []) {
        if (isset($formData['register'])) {
            $user = UserDTO::create(
                $formData['username'],
                $formData['password'],
                $formData['first_name'],
                $formData['last_name'],
                $formData['born_on']
            );

            if($userService->register($user, $formData['confirm_password'])) {
                $this->redirect('login.php');
            }
        } else {
            $this->render('users/register');
        }
    }
}