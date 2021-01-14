<?php /** @var \App\Data\UserDTO $data */ ?>

<h1>Not Approve Users</h1>

<table border="1">
    <thead>
    <th>ID</th>
    <th>FirstName</th>
    <th>LastName</th>
    <th>Email</th>
    <th>Approve</th>
    </thead>
    <?php foreach ($data as $users): ?>
        <tr>
            <td><?= $users['id'] ?></td>
            <td><?= $users['first_name'] ?></td>
            <td><?= $users['last_name'] ?></td>
            <td><?= $users['email'] ?></td>
            <td>
                <form method="POST" action="approve_users.php">
                    <input type="hidden" name="user_id" value="<?= $users['id'] ?>">
                    <input type="checkbox" name="approved_user"  value="1" onchange="this.form.submit()">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

