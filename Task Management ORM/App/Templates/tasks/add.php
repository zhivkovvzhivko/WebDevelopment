<?php /** @var \App\Data\EditDTO $data */ ?>

<h1>Add new task</h1>

<form method="post">
        Title: <input type="text" name="title" minlength="3" maxlength="50"> <br/>
        Category: <select name="category_id">
        <?php foreach($data->getCategories() as $category): ?>
            <option value="<?=$category->getId() ?>"><?=$category->getName() ?></option>
        <?php endforeach; ?>
        </select><br/>
        Descrioption: <input type="text" name="description" minlength="10" maxlength="10000"> <br/>
        Location: <input type="text" name="location" minlength="3" maxlength="100"> <br/>
        Started On: <input type="date" name="started_on"> <br/>
        Due date: <input type="date" name="due_date"> <br/>
    <div>
        <input type="submit" name="save" value="Save task">
    </div>
</form>

<a href="all.php">List</a>