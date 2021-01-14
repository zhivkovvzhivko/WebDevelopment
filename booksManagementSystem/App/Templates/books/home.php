<?php /** @var array $data */ ?>

<h3>Your created books list</h3>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Isbn</th>
        <th>Descrioption</th>
        <th>Genre</th>
        <th>Image</th>
    </tr>
    <?php foreach ($data as $book): ?>
    <tr>
        <td><?= $book['title'] ?></td>
        <td><?= $book['isbn'] ?></td>
        <td><?= $book['description'] ?></td>
        <td><?= $book['genre_id'] ?></td>
        <td><?= $book['image'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
