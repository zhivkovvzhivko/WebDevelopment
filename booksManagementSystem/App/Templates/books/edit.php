<?php /** @var \App\Data\EditDTO $data */ ?>

<h1>Edit Book - <?= $data->getBook()->getTitle() ?></h1>

<form method="post">
    Title: <input type="text" name="title" minlength="3" maxlength="50" value="<?= $data->getBook()->getTitle() ?>"/> <br/>
    ISBN: <input type="text" name="isbn" minlength="3" maxlength="50" value="<?= $data->getBook()->getIsbn() ?>"/> <br/>
    Description: <input type="text" name="description" minlength="3" maxlength="50" value="<?= $data->getBook()->getDescription() ?>"/> <br/>
    Genre: <select name="genre_id" minlength="3" maxlength="50"/> <br/>
    <?php foreach($data->getGenres() as $genre): ?>
        <?php if($genre->getId() === $data->getBook()->getGenre()->getId()): ?>
            <option selected="selected" value="<?= $genre->getId(); ?>"><?= $genre->getName(); ?></option>
        <?php else: ?>
            <option value="<?= $genre->getId(); ?>"><?= $genre->getName(); ?></option>
        <?php endif; ?>
    <?php endforeach; ?>
    </select> <br/> <br/>
    <input type="submit" name="save" value="Save">
</form>

<a href="dashboard.php">List</a>
