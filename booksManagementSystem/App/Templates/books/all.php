<?php
/** @var \App\Data\BookDTO[] $data  */
/** @var array $additionalData  */
/** @var \App\Data\ErrorDTO $error */
?>

<?php if ($error): ?>
<span style="color:red"><?= $error->getMessage() ?></span>
<?php endif; ?>

<h1>All books</h1>
<h3> <a href="my_books.php?user_id=<?= $_SESSION['id'] ?>">My books</a> </h3>

<?php
$isAdmin = false;
foreach ($additionalData as $role) {
    if (isset($role['role_name']) && $role['role_name'] == 'ADMIN') {
        $isAdmin = true;
?>
    <a href="add_book.php">Add book</a> |
<?php
    }
}
?>
<a href="logout.php">Logout</a> <br/><br/>

<table border="1">
    <thead>
        <thead>
            <tr>
                <td>Title</td>
                <td>Genre</td>
                <td>Author</td>
                <?php if ($isAdmin): ?>
                <td>Edit</td>
                <td>Delete</td>
                <?php endif; ?>
                <td>Add to collection</td>
            </tr>
        </thead>
    </thead>
    <tbody>
        <?php foreach($data as $book): ?>
        <tr>
            <td> <a href="show_book.php?id=<?= $book->getId() ?>"><?= $book->getTitle() ?></a> </td>
            <td><?= $book->getGenre()->getName() ?></td>
            <td><?= $book->getAuthor()->getFirstName() ?></td>
            <?php if ($isAdmin): ?>
            <td><a href="edit_book.php?id=<?= $book->getId() ?>">edit book</a></td>
            <td><a href="delete_book.php?id=<?= $book->getId() ?>">delete book</a></td>
            <?php endif; ?>
            <td>
                <a href="add_user_book.php?user_id=<?= $_SESSION['id'] ?>&book_id=<?= $book->getId() ?>">Add</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
