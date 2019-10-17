<?php

namespace Database;

interface PrepareStatementInterface
{
    public function execute(array $params = []) : ResultSetInterface;
}
