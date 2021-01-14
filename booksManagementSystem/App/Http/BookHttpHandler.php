<?php

namespace App\Http;

use App\Data\BookDTO;
use App\Data\EditDTO;
use App\Data\ErrorDTO;
use App\Service\BookService;
use App\Service\BookServiceInterface;
use App\Service\GenreService;
use App\Service\GenreServiceInterface;
use App\Service\UserService;
use App\Service\UserServiceInterface;

class BookHttpHandler extends HttpHandlerAbstract
{
    public function add(BookService $bookService,
                        UserServiceInterface $userService,
                        GenreServiceInterface $genreService,
                        array $formData)
    {
        $book = $this->dataBinder->bind($formData, BookDTO::class);
        $editDTO = new EditDTO();
        $editDTO->setBook($book);
        $editDTO->setGenres($genreService->getAll());

        if (isset($formData['save'])) {
            $this->handleInsertProcess($bookService, $userService, $genreService, $formData);
        } else {
            $this->render('books/add', $editDTO);
        }
    }
    
    public function edit(BookService $bookService,
                     UserServiceInterface $userService,
                     GenreServiceInterface $genreService,
                     array $formData, array $getData = [])
    {
        $book = $bookService->getOne($getData['id']);
        $editDTO = new EditDTO();
        $editDTO->setBook($book);
        $editDTO->setGenres($genreService->getAll());

        if (isset($formData['save'])) {
            $this->handleEditProccess($bookService, $userService, $genreService, $formData, $getData);
        } else {
            $this->render('books/edit', $editDTO);
        }
    }

    public function delete(BookService $bookService, $getData = [])
    {
        if (!isset($getData['id'])) {
            $this->redirect('dashboard.php');
        }
        $bookService->delete(intval($_GET['id']));
        $this->redirect('dashboard.php');
    }

    public function show(BookServiceInterface $bookService, $getData)
    {
        if (!isset($getData['id'])) {
            $this->redirect('dashboard.php');
        }

        $book = $bookService->getOne($getData['id']);
        $this->render('books/show', $book);
    }

    public function userBooks(BookServiceInterface $bookService, $getData) {
        if (!isset($getData['user_id'])) {
            $this->redirect('dashboard.php');
        }

        $userBooks = $bookService->getBooksCreatedByUser(intval($getData['user_id']));
        if ($userBooks !== null) {
            $this->render('books/home', $userBooks);
        }
    }

    private function handleInsertProcess($bookService, $userService, $genreService, $formData)
    {
        /** @var BookDTO $book */
        $book = $this->dataBinder->bind($formData, BookDTO::class);

        /** @var UserService $userService */
        $author = $userService->currentUser();

        /** @var GenreService $genreService */
        $genre = $genreService->getOne(intval($formData['genre_id']));
        $book->setAuthor($author);
        $book->setGenre($genre);

        if ($_FILES['image']['name']) {
            $imagePath = 'public/images/' . uniqid('book_') . '.' . explode('/', $_FILES['image']['type'])[1];
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                $this->render('books/add', '', '', new ErrorDTO('Missing image'));
            } else {
                $book->setImage($imagePath);
            }
        }

        /** @var BookService $bookService */
        $bookService->add($book);

        $this->redirect('dashboard.php');
    }

    private function handleEditProccess($bookService, $userService, $genreService, $formData, $getData)
    {
        try {
            /** @var BookDTO $book */
            $book = $this->dataBinder->bind($formData, BookDTO::class);
            /** @var UserService $userService */
            $author = $userService->currentUser();
            /** @var GenreService $genreService */
            $genre = $genreService->getOne($formData['genre_id']);
            $book->setGenre($genre);
            $book->setAuthor($author);

            /** @var BookService $bookService */
            $bookService->edit($book, $getData['id']);

            $this->redirect('dashboard.php');
        } catch (\Exception $ex) {

        }
    }
}
