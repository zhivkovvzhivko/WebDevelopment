<?php

spl_autoload_register();

$db = DBConnection::getConnection();
$products = new Products($db);
$categories = new Categories($db);

$product = ['product_id' =>'', 'product_name' => '', 'price' => '', 'description' => '', 'cat_id' => ''];

if ($_POST) {

    $product_id = $_POST['product_id'] ?? null;
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $cat_id = $_POST['cat_id'];

    if (!$product_id){
        $products->createProduct($product_name, $price, $description, $cat_id);
        $mode = 1;
    } else {
        $products->updateProduct($product_id, $product_name, $price, $description, $cat_id);
        $mode = 2;
    }
    header('Location: view_product.php?product_id='.$product_id . '&mode=' . $mode);
    exit;
} elseif (isset($_GET['product_id'])) {
    $product = $products->getOne($_GET['product_id']);
}
include_once('header.php');
include_once('edit_form.php');
include_once('footer.php');