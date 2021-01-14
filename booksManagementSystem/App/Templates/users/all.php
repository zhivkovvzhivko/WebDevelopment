<?php /** @var \App\Data\UserDTO[] $data */ ?>

<h1>All Users</h1>

<table border="1">
    <thead>
        <th>ID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
    </thead>
    <?php foreach ($data as $user): ?>
    <tr>
        <td><?= $user->getId() ?></td>
        <td><?= $user->getFirstName() ?></td>
        <td><?= $user->getLastName() ?></td>
        <td><?= $user->getEmail() ?></td>
    </tr>
    <?php endforeach; ?>
</table>

Go back to your <a href="profile.php">profile</a>