<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<h1>USER LOGIN</h1>

<form method="POST">
    <div>
        Username: <label>
            <input type="text" name="username"/>
        </label>
    </div>
    <div>
        Password: <label>
            <input type="text" name="password"/>
        </label>
    </div>
    <div>
        <input type="submit" name="login" value="Login"/>
    </div>
</form>