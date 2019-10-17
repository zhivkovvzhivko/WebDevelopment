<?php

namespace Database;

class PDOResultSet implements ResultSetInterface
{
    private $pdoStatement;

    public function __construct(\PDOStatement $pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }

    public function fetch($className)
    {
        while ($row = $this->pdoStatement->fetchObject($className)) {
            yield $row;
        }
    }
}