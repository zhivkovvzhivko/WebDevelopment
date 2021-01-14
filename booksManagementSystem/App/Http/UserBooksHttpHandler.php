<?php

namespace App\Http;

use App\Data\ErrorDTO;
use App\Service\UserBooksService;
use App\Service\UserBooksServiceInterface;

class UserBooksHttpHandler extends HttpHandlerAbstract
{
    public function add(UserBooksService $userBooksService, $getData)
    {
        if (!isset($getData['user_id']) || !isset($getData['book_id'])) {
            $this->render('books/all','','',
                new ErrorDTO('Invalid user_id or book_id'));
        }
        $data = $userBooksService->getOneUserBook(intval($getData['user_id']), $getData['book_id']);
        if ($data === null) {
            $userBooksService->add($getData['user_id'], $getData['book_id']);
            $this->redirect('dashboard.php');
        }
    }

    public function delete(UserBooksServiceInterface $userBooksService, $getData)
    {
        if ($getData['user_id'] === null || $getData['book_id'] === null) {
            $this->render('home/myBooks', '','',
                new ErrorDTO('Missing user_id ot book_id'));
        }
        $userBooksService->remove($getData['user_id'], $getData['book_id']);
        $this->redirect('home/myBooks');
    }

    public function myBooks(UserBooksServiceInterface $userBooksService, $userId)
    {
        $data = $userBooksService->getUserBooks($userId);

        if (null !== $data) {
            $this->render('home/myBooks', $data,'',null);
        } else {
            $this->render('books/all',
                '','',
                new UserDTO('There is no added books to collection'));
        }
    }
}
