<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<h1>USER REGISTER</h1>

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
        Confirm password: <label>
            <input type="text" name="confirm_password"/>
        </label>
    </div>
    <div>
        First name: <label>
            <input type="text" name="firstName"/>
        </label>
    </div>
    <div>
        Last name: <label>
            <input type="text" name="lastName"/>
        </label>
    </div>
    <div>
        <input type="submit" name="register" value="Register"/>
    </div>
</form>