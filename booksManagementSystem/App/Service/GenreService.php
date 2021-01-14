<?php

namespace App\Service;

use App\Data\GenreDTO;
use App\Repository\GenreRepositoryInterface;
use Database\DatabaseInterface;

class GenreService implements GenreServiceInterface
{
    /**
     * @var GenreRepositoryInterface
     */
    private $genreRepository;

    public function __construct(GenreRepositoryInterface $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    public function getAll(): \Generator
    {
        return $this->genreRepository->findAll();
    }

    public function getOne(int $id): GenreDTO
    {
        $genre = $this->genreRepository->findOne($id);
        if ($genre === null) {
            throw new \Exception('Genre not found');
        }

        return $genre;
    }
}
