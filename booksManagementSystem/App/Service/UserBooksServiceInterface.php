<?php

namespace App\Service;

use App\Repository\UserBooksDTO;

interface UserBooksServiceInterface
{
    public function add(int $userId, int $bookId): bool;
    public function remove(int $userId, int $bookId): bool;
    public function getUserBooks(int $userId): ?\Generator;
    public function getOneUserBook(int $userId, int $bookId): ?array;
}