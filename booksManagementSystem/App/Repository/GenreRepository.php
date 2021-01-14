<?php

namespace App\Repository;

use App\Data\GenreDTO;
use Database\DatabaseInterface;

class GenreRepository implements GenreRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function findAll(): \Generator
    {
        return $this->db->query("
            SELECT id, name
            FROM genres
        ")->execute()->
            fetch(GenreDTO::class);
    }

    public function findOne($id): GenreDTO
    {
        return $this->db->query("
            SELECT id, name
            FROM genres
            WHERE id = ?
        ")->execute([$id])->
        fetch(GenreDTO::class)
        ->current();
    }
}
