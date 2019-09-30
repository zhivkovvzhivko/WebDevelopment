<?php

namespace Controllers;

use Models\Products;

class ProductsController
{
    private $db_connection;
    /**
     * @var Products
     */
    private $model;

    public function __construct($db)
    {
        $this->db_connection = $db;
        $this->model = new Products($this->db_connection);
    }

    public function index()
    {
        renderView(__FUNCTION__);
    }

    public function edit()
    {
        $data['categories_model'] = new Categories($this->db_connection);

        $data['product'] = ['product_id' => '', 'product_name' => '', 'price' => '', 'description' => '', 'cat_id' => ''];

        if ($_POST) {

            $product_id = $_POST['product_id'] ?? null;
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $cat_id = $_POST['cat_id'];

            if (!$product_id) {
                $this->model->createProduct($product_name, $price, $description, $cat_id);
                $mode = 1;
            } else {
                $this->model->updateProduct($product_id, $product_name, $price, $description, $cat_id);
                $mode = 2;
            }
            header('Location: view/' . $product_id . '&mode=' . $mode);
            exit;
        } elseif (isset($_GET['product_id'])) {
            $data['product'] = $this->model->getOne($_GET['product_id']);
        }

        renderView(__FUNCTION__. $data);
    }

    public function view($product_id)
    {
        if (!$product_id) {
            throw new Exception('No product id');
        }

        $product = $this->model->getOne($product_id);

        if (!$product) {
            throw new Exception('No product found');
        }

        renderView(__FUNCTION__);
    }

    private function renderView($view, array $data=[]) {
        include('Views/header.php');
        include ('Views/'.$view.'.php');
        include ('Views/footer.php');
    }
}
