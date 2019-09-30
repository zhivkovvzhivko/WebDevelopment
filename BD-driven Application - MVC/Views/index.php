<?php
echo '<a href="edit_product.php">Create new product</a>';
echo '<table border="1">
            <thead>
                <tr><td>ID</td><td>Name</td><td>Category</td><td>Create date</td></tr>
            </thead>
';

/** @var \Models\Products $model */
foreach($this->model->getList() as $product) {
    $date = $product['product_date'] ? date('d.m.Y', strtotime($product['create_date'])) : 'n/a';

    echo '<tr>';
    echo '<td>'.$product['product_id'].'</td>';
    echo '<td>'.$product['product_name'].'</td>';
    echo '<td>'.$product['cat_name'].'</td>';

    echo '<td>'. $date .'</td>';
    echo '<td><a href="products/view/' .$product['product_id']. '>View</a></td>';
    echo '<td><a href="products/edit/"'.$product['product_id']. '>Edit</a></td>';
    echo '</tr>';
}
echo '</table>';