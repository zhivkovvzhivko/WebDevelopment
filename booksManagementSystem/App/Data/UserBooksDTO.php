<?php

namespace App\Repository;

use App\Data\BookDTO;
use App\Data\UserDTO;

class UserBooksDTO
{
    /**
     * @var UserDTO
     */
    public $userDTO;

    /**
     * @var BookDTO
     */
    public $book;

    public function __construct(UserDTO $userDTO, BookDTO $book)
    {
        $this->userDTO = $userDTO;
        $this->book = $book;
    }

    /**
     * @return UserDTO
     */
    public function getUserDTO(): UserDTO
    {
        return $this->userDTO;
    }

    /**
     * @param UserDTO $userDTO
     */
    public function setUserDTO(UserDTO $userDTO): void
    {
        $this->userDTO = $userDTO;
    }

    /**
     * @return BookDTO
     */
    public function getBook(): BookDTO
    {
        return $this->book;
    }

    /**
     * @param BookDTO $book
     */
    public function setBook(BookDTO $book): void
    {
        $this->book = $book;
    }
}