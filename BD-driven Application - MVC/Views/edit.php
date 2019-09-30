<form method="POST">
    <input type="hidden" name="product_id" value="<?= $data['product']['product_id']?>">
    <table>
        <tr>
            <td>Product_id:</td>
            <td> <?= $data['product']['product_id']?> </td>
        </tr>
        <tr>
            <td>Name:</td>
            <td>
                <input type="text" name="product_name" value="<?= $data['product']['product_name']?>">
            </td>
        </tr>
        <tr>
            <td>Price:</td>
            <td>
                <input type="text" name="price" value="<?= $data['product']['price']?>">
            </td>
        </tr>
        <tr>
            <td>Description:</td>
            <td>
                <input type="text" name="description" value="<?= $data['product']['description']?>">
            </td>
        </tr>
        <tr>
            <th>Category</th>
            <td>
                <select name="cat_id">
                    <option>Select Category</option>
                    <?php foreach ($data['categories_model']->getList() as $category): ?>
                        <?php $selected = $data['product']['cat_id'] == $category['cat_id'] ? 'selected' : '';?>
                        <option value="<?= $category['cat_id'] ?>" <?=$selected?> ><?= $category['cat_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <?php $btn_name = isset($data['product']['product_id']) ? 'Edit' : 'Create'; ?>
                <button type="submit" name="save" value="1"><?= $btn_name ?></button>
            </td>
        </tr>
    </table>
</form>