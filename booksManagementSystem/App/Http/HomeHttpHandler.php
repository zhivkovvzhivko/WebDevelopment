<?php

namespace App\Http;

use App\Service\BookService;
use App\Service\UserService;
use App\Service\UserServiceInterface;

class HomeHttpHandler extends HttpHandlerAbstract
{
    public function index(UserServiceInterface $userService) {
        if ($userService->isLogged()) {
            $this->render('books/all');
        } else {
            $this->render('home/index');
        }
    }

    public function dashboard(BookService $bookService) {
        if (!isset($_SESSION['id'])) {
            $this->render('users/login');
        }

        $allBooks = $bookService->getAll();
        $userRoles = $bookService->getBookOwnerRoleName($_SESSION['id']);

        $this->render('books/all', $allBooks, $userRoles);
    }
}
