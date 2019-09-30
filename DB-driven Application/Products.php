<?php

class Products
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getList()
    {
        $result = $this->db->query('
        SELECT product_id, product_name, create_date, cat_name         
        FROM products p
        INNER JOIN categories c USING (CAT_ID)
        ');

        if ($result) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                yield $row;
            }
        } else {
            die('Error: '. $this->db->error_info()[2]);
        }
    }

    public function getOne(int $product_id)
    {
        $result = $this->db->query('
        SELECT product_id, product_name, create_date, cat_name, description, last_update, price, cat_id        
        FROM products p
        INNER JOIN categories c USING (CAT_ID)
        WHERE product_id = :product_id
        ');

        $result->bindParam('product_id', $product_id);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function createProduct($product_name, $price, $description, $cat_id)
    {
        $result = $this->db->prepare('INSERT INTO products (PRODUCT_NAME, CAT_ID, DESCRIPTION, PRICE)
                            VALUES (:product_name, :cat_id, :description, :price)');
        $result->bindParam('product_name', $product_name);
        $result->bindParam('cat_id', $cat_id);
        $result->bindParam('description', $description);
        $result->bindParam('price', $price);

        $result->execute();

        return $this->db->lastInsertId();
    }

    public function updateProduct($product_id, $product_name, $price, $description, $cat_id)
    {
        $result = $this->db->prepare('UPDATE products 
                            SET PRODUCT_NAME = :product_name, 
                                CAT_ID = :cat_id,
                                DESCRIPTION = :description,
                                PRICE = :price
                                WHERE PRODUCT_ID = :product_id');
        $result->bindParam('product_id', $product_id);
        $result->bindParam('product_name', $product_name);
        $result->bindParam('cat_id', $cat_id);
        $result->bindParam('description', $description);
        $result->bindParam('price', $price);

        $result->execute();

        return $this->db->lastInsertId();

    }
}