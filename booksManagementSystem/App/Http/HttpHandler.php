<?php

namespace App\Http;

use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;
use App\Service\UsersRolesServiceInterface;

class HttpHandler extends HttpHandlerAbstract
{
    CONST USER_ROLE = 2;

    public function index(UserServiceInterface $userService) {
        $this->render('home/index');
    }

    public function allUsers(UserServiceInterface $userService) {
        $this->render('users/all', $userService->all());
    }

    public function login(UserServiceInterface $userService, array $formData = []) {
        if (isset($formData['login'])) {
            $this->handleLoginProcess($userService, $formData);
        } else{
            $this->render('users/login');
        }
    }

    public function register(UserServiceInterface $userService,
                             UsersRolesServiceInterface $usersRolesService,
                             array $formData = [])
    {
        if (isset($formData['register'])) {
            $this->handleRegisterProcess($userService, $usersRolesService, $formData);
        } else {
            $this->render('users/register');
        }
    }

    /**
     * @param $formData
     * @param UsersRolesServiceInterface $usersRolesService
     * @param UserServiceInterface $userService
     */
    private function handleRegisterProcess(UserServiceInterface $userService, $usersRolesService, $formData): void
    {
        $user = UserDTO::create(
            $formData['first_name'],
            $formData['last_name'],
            $formData['email'],
            $formData['password']
        );

        $user_id = $userService->register($user, $formData['confirm_password']);

        if (!is_null($user_id) && $usersRolesService->add($user_id, self::USER_ROLE))
        {
            $this->redirect('login.php');
        } else {
            $this->render('app/error', new ErrorDTO('Email already is taken or password mismatch. It could be not added role too.'));
        }
    }

    private function handleLoginProcess(UserServiceInterface $userService, $formData): void
    {
        $curentUser = $userService->login($formData['email'], $formData['password']);
        if ($curentUser !== null && $curentUser->getActive() != 0) {
            $_SESSION['id'] = $curentUser->getId();
            $this->redirect('dashboard.php');
        } else {
            $this->render(
                'users/login',
                new ErrorDTO('Email or password mismatch or still not approved account by admin')
            );
        }
    }

    public function notApprovedUsers(UserServiceInterface $userService, $postData)
    {
        if (!$userService->isAdmin()) {
            throw  new \Exception('Only admin can approve users');
        }

        $users = $userService->getNotApproveUsers();
        if ($users !== null) {
            if (isset($postData['approved_user']) && isset($postData['user_id'])) {
                $userService->approveUser($postData['user_id'], $postData['approved_user']);
                $this->render('users/ApproveUsers', $users);
            } else {
                $this->render('users/approveUsers', $users);
            }
        } else {
            throw new \Exception('There is no not approved users');
        }
    }
}
