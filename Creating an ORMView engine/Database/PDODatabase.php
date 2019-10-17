<?php

namespace Database;

class PDODatabase implements DatabaseInterface
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function query(string $query) : PrepareStatementInterface
    {
        $stmt = $this->pdo->prepare($query);
        return new PDOPrepareStatement($stmt);
    }

    public function getLastError()
    {
        // TODO: Implement getLastError() method.
    }

    public function getLastId()
    {
        // TODO: Implement getLastId() method.
    }
}