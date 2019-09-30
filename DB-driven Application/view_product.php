<?php

spl_autoload_register();

$db = DBConnection::getConnection();
$products = new Products($db);

$product_id = $_GET['product_id'] ?? null;
include('header.php');

if (isset($_GET['mode'])) {
    if ($_GET['mode'] == 1) {
        echo "Seccessfull created product <br/><br/>";
    } else {
        echo "Seccessfull update product <br/><br/>";
    }
}

if ($product_id){

    $product_data = $products->getOne($product_id);
    if ($product_data) {
        foreach ($product_data as $key => $value) {
            echo $key .' : '. $value . '<br/>';
        }
    } else {
        echo 'No product found!';
    }
} else {
    echo 'No product id';
}

include('footer.php');

