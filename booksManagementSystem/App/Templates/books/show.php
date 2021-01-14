<?php /** @var \App\Data\BookDTO $data */ ?>

<h3>Book "<?= $data->getTitle(); ?>'s" details</h3>

<div>
    <div>
        <label>Image: </label>
        <?php if ($data->getImage() === null): ?>
            <span>Image not upload</span>
        <?php else: ?>
            <img src="/test_book/<?= $data->getImage() ?>"/>
        <?php endif; ?>
    </div>
    <div>
        <label>Isbn: </label>
        <span><?= $data->getIsbn() ?></span>
    </div>
    <div>
        <label>Description: </label>
        <span><?= $data->getDescription() ?></span>
    </div>
    <div>
        <label>Genre: </label>
        <span><?= $data->getGenre()->getName() ?></span>
    </div>
    <div>
        <label>Author: </label>
        <span><?= $data->getAuthor()->getFirstName() ?></span>
    </div>

    <br/>
    <a href="dashboard.php">Dashboard</a>
</div>
