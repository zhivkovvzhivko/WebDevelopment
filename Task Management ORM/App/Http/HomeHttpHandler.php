<?php

namespace App\Http;

use App\Service\UserServiceInterface;

class HomeHttpHandler extends HttpHandlerAbstract
{
    public function index(UserServiceInterface $service)
    {
        if ($service->isLogged()) {
            $this->render('tasks/all');
        } else {
            $this->$this->render('home/index');
        }
    }

    public function dashboard()
    {
        if (!isset($_SESSION['id'])) {
            $this->redirect('login.php');
        }

        $this->render('tasks/all');
    }
}