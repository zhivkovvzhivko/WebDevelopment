<?php /** @var \App\Data\UserDTO[] $data */ ?>

<h1>All users</h1>

<table border="1">
    <thead>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Fullname</td>
            <td>Born On</td>
        </tr>
    </thead>
    <tbody>
            <?php foreach($data as $user): ?>
            <tr>
                <td><?= $user->getId() ?></td>
                <td><?= $user->getFirstName() ?></td>
                <td><?= $user->getLastName() ?></td>
                <td><?= $user->getBornOn() ?></td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>

Go back to your profile <a href="profile.php">profile</a>
