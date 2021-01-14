<?php

namespace App\Service;

use App\Repository\UserBooksDTO;
use App\Repository\UserBooksRepositoryInterface;

class UserBooksService implements UserBooksServiceInterface
{
    /**
     * @var UserBooksRepositoryInterface
     */
    public $userBooksRepository;

    public function __construct(UserBooksRepositoryInterface $userBooksRepository)
    {
        $this->userBooksRepository = $userBooksRepository;
    }

    public function add(int $userId, int $bookId): bool
    {
        return $this->userBooksRepository->insert($userId, $bookId);
    }

    public function remove(int $userId, int $bookId): bool
    {
        return $this->userBooksRepository->delete($userId, $bookId);
    }

    public function getUserBooks(int $userId): ?\Generator
    {
        return $this->userBooksRepository->findUserBooks($userId);
    }

    public function getOneUserBook(int $userId, int $bookId): ?array
    {
        return $this->userBooksRepository->findOneUserBook($userId, $bookId);
    }
}