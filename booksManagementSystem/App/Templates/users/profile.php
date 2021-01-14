<?php /** @var \App\Data\UserDTO $data */ ?>

<h1>YOUR PROFILE</h1>

<form method="POST">
    <div>
        First Name: <label>
            <input type="text" name="first_name" value="<?= $data->getFirstName() ?>">
        </label>
    </div>
    <div>
        Last Name: <input type="text" name="last_name" value="<?= $data->getLastName() ?>">
    </div>
    <div>
        Email: <input type="email" name="email" value="<?= $data->getEmail() ?>">
    </div>
    <div>
        Password: <input type="text" name="password">
    </div>
    <div>
        <input type="submit" name="edit" value="Edit Profile">
    </div>
</form>

You can <a href="logout.php">logout</a> or see <a href="all.php">all users</a>