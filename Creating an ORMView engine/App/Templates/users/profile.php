<?php /** @var \App\Data\UserDTO $data */ ?>

<h1>YOUR PROFILE</h1>

<form method="POST">
    <div>
        Username: <label>
            <input type="text" name="username" value="<?= $data->getUsername()?>"/>
        </label>
    </div>
    <div>
        Password: <label>
            <input type="text" required="required" name="password"/>
        </label>
    </div>
    <div>
        First name: <label>
            <input type="text" name="firstName" value="<?= $data->getFirstName() ?>"/>
        </label>
    </div>
    <div>
        Last name: <label>
            <input type="text" name="lastName" value="<?= $data->getLastName() ?>"/>
        </label>
    </div>
    <div>
        Birthday: <label>
            <input type="text" name="bornOn" value="<?= $data->getBornOn() ?>"/>
        </label>
    </div>
    <div>
        <input type="submit" name="edit" value="Edit Profile"/>
    </div>
</form>

You can <a href="logout.php">logout</a> or see
                    <a href="all.php">all users</a>
