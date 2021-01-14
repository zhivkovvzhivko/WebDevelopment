<?php

namespace App\Repository;

use App\Data\BookDTO;
use App\Data\GenreDTO;
use App\Data\UserDTO;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class BookRepository implements BookRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * @var DataBinderInterface
     */
    private $dataBinder;

    public function __construct(DatabaseInterface $db, DataBinderInterface $dataBinder)
    {
        $this->db = $db;
        $this->dataBinder = $dataBinder;
    }

    /**
     * @return \Generator|BookDTO[]
     */
    public function findAll(): \Generator
    {
        $lazyBookResult = $this->db->query("
            SELECT 
                b.id, 
                b.title, 
                b.isbn, 
                b.description, 
                b.image, 
                g.id as genre_id, 
                g.name, 
                u.id as user_id,
                u.first_name,
                u.last_name,
                u.email
            FROM books as b
            INNER JOIN users as u ON u.id = b.user_id
            INNER JOIN genres as g ON g.id = b.genre_id   
        ")->execute()
        ->fetch();

        foreach ($lazyBookResult as $row) {
            /** @var BookDTO $book */
            $book = $this->dataBinder->bind($row, BookDTO::class);
            /** @var UserDTO $author */
            $author = $this->dataBinder->bind($row, UserDTO::class);
            /** @var GenreDTO $genre */
            $genre = $this->dataBinder->bind($row, GenreDTO::class);
            $book->setAuthor($author);
            $book->setGenre($genre);

            yield $book;
        }
    }

    public function findOne($id): BookDTO
    {

        $row = $this->db->query("
            SELECT 
                b.id, 
                b.title, 
                b.isbn, 
                b.description, 
                b.image, 
                g.id as genre_id, 
                g.name, 
                u.id as user_id,
                u.first_name,
                u.last_name,
                u.email
            FROM books as b
            INNER JOIN users as u ON u.id = b.user_id
            INNER JOIN genres as g ON g.id = b.genre_id   
            WHERE b.id = ?
        ")->execute([$id])
            ->fetch()
            ->current();

        /** @var BookDTO $book */
        $book = $this->dataBinder->bind($row, BookDTO::class);
        /** @var UserDTO $author */
        $author = $this->dataBinder->bind($row, UserDTO::class);
        /** @var GenreDTO $genre */
        $genre = $this->dataBinder->bind($row, GenreDTO::class);
        $book->setAuthor($author);
        $book->setGenre($genre);

        return $book;
    }

    public function insert(BookDTO $bookDTO): bool
    {
        $this->db->query("
            INSERT INTO books (title, isbn, description, image, genre_id, user_id)
            VALUES (?,?,?,?,?,?)
        ")->execute([
            $bookDTO->getTitle(),
            $bookDTO->getIsbn(),
            $bookDTO->getDescription(),
            $bookDTO->getImage(),
            $bookDTO->getGenre()->getId(),
            $bookDTO->getAuthor()->getId()
        ]);

        return true;
    }

    public function update(BookDTO $bookDTO, int $id): bool
    {
        $this->db->query("
            UPDATE books 
            SET 
                title = ?, 
                isbn = ?, 
                description = ?, 
                image = ?, 
                genre_id = ?, 
                user_id = ?
            WHERE id = ?
        ")->execute([
            $bookDTO->getTitle(),
            $bookDTO->getIsbn(),
            $bookDTO->getDescription(),
            $bookDTO->getImage(),
            $bookDTO->getGenre()->getId(),
            $bookDTO->getAuthor()->getId(),
            $id
        ]);

        return true;
    }

    public function remove(int $id): bool
    {
        $this->db->query("DELETE FROM books WHERE id = ?")->execute([$id]);
        return true;
    }

    public function findBookOwnerRoleName($userId): ?\Generator
    {
        $data =  $this->db->query("
            SELECT DISTINCT
                r.role_name 
            FROM `books` b
            JOIN users AS u ON u.id = b.user_id
            JOIN users_roles AS ur ON u.id = ur.user_id
            JOIN roles AS r ON r.id = ur.role_id
            WHERE u.id = ?
        ")->execute([$userId])
            ->fetch();

        return $data;
    }


    public function findBooksCreatedByUser($userId): ?\Generator
    {
        return $this->db->query("
            SELECT 
                b.id,
                b.title,
                b.isbn,
                b.description,
                b.image,
                b.genre_id.id,
                b.title,
                b.isbn,
                b.description,
                b.image,
                b.genre_id,
                u.id AS user_id,
                u.first_name,
                u.last_name   
            FROM books AS b
            JOIN users AS u ON u.id = b.user_id 
            WHERE u.id = ?
        ")->execute([$userId])->fetch();
    }
}
