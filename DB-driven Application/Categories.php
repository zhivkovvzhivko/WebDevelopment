<?php


class Categories
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getList()
    {
        $result = $this->db->query('SELECT cat_id, cat_name FROM categories');

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            yield $row;
        }
    }
}