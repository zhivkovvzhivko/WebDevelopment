<?php
/** @var \App\Data\EditDTO $data */
/** @var \App\Data\ErrorDTO $error */
?>

<?php if ($error): ?>
    <span style="color:red"><?= $error->getMessage() ?></span>
<?php endif; ?>

<h1>Add new Book</h1>

<form method="post" enctype="multipart/form-data">
    Title: <input type="text" name="title" minlength="3" maxlength="50"/> <br/><br/>
    ISBN: <input type="text" name="isbn" minlength="3" maxlength="50"/> <br/><br/>
    Description: <input type="text" name="description" minlength="3" maxlength="50"/> <br/><br/>
    Genre: <select name="genre_id" minlength="3" maxlength="50"/> <br/><br/>
        <?php foreach($data->getGenres() as $genre): ?>
        <option value="<?= $genre->getId(); ?>"><?= $genre->getName(); ?></option>
        <?php endforeach; ?>
    </select> <br/><br/>

    Image: <input src="test_book/public/images" type="file" name="image"/> <br/><br/>

    <input type="submit" name="save" value="Save">
</form>

<a href="dashboard.php">List</a>
