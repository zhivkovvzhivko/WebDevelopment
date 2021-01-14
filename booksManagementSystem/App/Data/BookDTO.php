<?php

namespace App\Data;

class BookDTO
{
    private $id;
    private $title;
    private $isbn;
    private $description;
    private $image;

    /**
     * @var GenreDTO
     */
    private $genre;
    /**
     * @var UserDTO
     */
    private $author;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($isbn): void
    {
        $this->isbn = $isbn;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getGenre(): GenreDTO
    {
        return $this->genre;
    }

    public function setGenre(GenreDTO $genre): void
    {
        $this->genre = $genre;
    }

    public function getAuthor(): UserDTO
    {
        return $this->author;
    }

    public function setAuthor(UserDTO $author): void
    {
        $this->author = $author;
    }
}
