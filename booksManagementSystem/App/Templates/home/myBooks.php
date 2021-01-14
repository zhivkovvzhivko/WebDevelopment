<?php
/** @var array $data */
/** @var \App\Data\ErrorDTO $error */
?>

<?php if ($error): ?>
    <span style="color:red"><?= $error->getMessage() ?></span>
<?php endif; ?>

<h3>My books</h3>

<a href="dashboard.php">Dashboard</a> <br/><br/>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Isbn</th>
        <th>Description</th>
        <th>Image</th>
        <th>GenreId</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($data as $book): ?>
        <tr>
            <td><?= $book['id'] ?></td>
            <td><?= $book['title'] ?></td>
            <td><?= $book['isbn'] ?></td>
            <td><?= $book['description'] ?></td>
            <td><?= $book['image'] ?></td>
            <td><?= $book['genre_id'] ?></td>
            <td>
                <a href="delete_user_book.php?user_id=<?= $_SESSION['id'] ?>&book_id=<?= $book['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>