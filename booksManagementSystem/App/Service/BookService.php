<?php

namespace App\Service;

use App\Data\BookDTO;
use App\Repository\BookRepositoryInterface;

class BookService implements BookServiceInterface
{
    /**
     * @var BookRepositoryInterface
     */
    private $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @return \Generator| BookDTO[]
     */
    public function getAll(): \Generator
    {
        return $this->bookRepository->findAll();
    }

    public function getOne(int $id): BookDTO
    {
        $book = $this->bookRepository->findOne($id);
        if ($book == null) {
            throw new \Exception('Book not found');
        }

        return $book;
    }

    public function add(BookDTO $bookDTO): bool
    {
        return $this->bookRepository->insert($bookDTO);
    }

    public function edit(BookDTO $bookDTO, int $id): bool
    {
        $book = $this->bookRepository->findOne($id);
        if ($book == null) {
            throw new \Exception('Book not found');
        }

        return $this->bookRepository->update($bookDTO, $id);
    }

    public function delete(int $id): bool
    {
        $book = $this->bookRepository->findOne($id);
        if ($book == null) {
            throw new \Exception('Book not found');
        }

        return $this->bookRepository->remove($id);
    }

    public function getBookOwnerRoleName($userId): ?\Generator
    {
        return $this->bookRepository->findBookOwnerRoleName($userId);
    }

    public function getBooksCreatedByUser($userId): ?\Generator
    {
        return $this->bookRepository->findBooksCreatedByUser($userId);
    }
}
