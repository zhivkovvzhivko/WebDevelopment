<?php

namespace App\Repository;

use Database\DatabaseInterface;

class UserBooksRepository implements UserBooksRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(int $userId, int $bookId): bool
    {
        $this->db->query("
            INSERT INTO user_books (user_id, book_id) VALUES (?, ?)
        ")->execute([
            $userId,
            $bookId
        ]);

        return true;
    }

    public function delete(int $userId, int $bookId): bool
    {
        $this->db->query("
            DELETE FROM user_books WHERE user_id = ? AND book_id = ?
        ")->execute([$userId, $bookId]);

        return true;
    }

    public function findOneUserBook(int $userId, int $bookId): ?array
    {
        return  $this->db->query("
            SELECT 
                ub.user_id,
                ub.book_id
            FROM user_books AS ub 
            WHERE ub.user_id = ? AND ub.book_id = ?
        ")->execute([$userId, $bookId])
            ->fetch()
            ->current();
    }

    /**
     * @param int $userId
     * @return \Generator|null
     */
    public function findUserBooks(int $userId): ?\Generator
    {
        $data =  $this->db->query("
            SELECT
                b.id,
                b.title,
                b.isbn,
                b.description,
                b.image,
                b.genre_id
            FROM user_books AS ub
            JOIN books AS b ON b.id = ub.book_id
            WHERE ub.user_id = ?
        ")->execute([$userId])
        ->fetch();

        return $data;
    }


}
