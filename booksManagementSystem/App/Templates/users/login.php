<?php /** @var \App\Data\ErrorDTO $data */ ?>

<span style="color:red"><?= $data->getMessage() ?></span>

<h1>USER LOGIN</h1>

<form method="POST">
    <div>
        Email: <input type="email" name="email">
    </div>
    <div>
        Password: <input type="text" name="password">
    </div>
    <div>
        <input type="submit" name="login" value="Login">
    </div>
</form>