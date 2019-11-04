<?php /** @var \App\Data\TaskDTO[] $data */ ?>

<h1>All tasks</h1>

<a href="add_task.php">Add new task</a> | <a href="logout.php">Logout</a>
<br/><br/>

<table border="1">
    <thead>
        <tr>
            <td>Title</td>
            <td>Category</td>
            <td>Author</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $task): ?>
        <tr>
            <td><?= $task->getTitle() ?></td>
            <td><?= $task->getAuthor()->getUsername(); ?></td>
            <td><?= $task->getCategory()->getName(); ?></td>
            <td><a href="edit_task?id=<?=$task->getId()?>">edit task</a></td>
            <td><a href="delete_task?id=<?=$task->getId()?>">delete task</a></td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>