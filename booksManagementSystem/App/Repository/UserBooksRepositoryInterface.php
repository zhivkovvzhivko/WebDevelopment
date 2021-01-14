<?php

namespace App\Repository;

interface UserBooksRepositoryInterface
{
    public function insert(int $userId, int $bookId): bool;
    public function delete(int $userId, int $bookId): bool;
    public function findOneUserBook(int $userId, int $bookId): ?array;

    /**
     * @param int $userId
     * @param int $bookId
     * @return \Generator|null
     */
    public function findUserBooks(int $userId): ?\Generator;

}