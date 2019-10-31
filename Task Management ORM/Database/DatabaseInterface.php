<?php

namespace Database;

interface DatabaseInterface
{
    public function query(string $query) : PrepareStatementInterface;

    public function getLastError();

    public function getLastId();
}