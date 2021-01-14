<?php

namespace Database;

class PDOResultSet implements ResultSetInterface
{
    private $pdoStatement;

    public function __construct(\PDOStatement $pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }

    public function fetch($className = null) : \Generator
    {
        if ($className === null) {
            while ($row = $this->pdoStatement->fetch(\PDO::FETCH_ASSOC)) {
                yield $row;
            }
        } else {
            while ($row = $this->pdoStatement->fetchObject($className)) {
                yield $row;
            }
        }
    }
}