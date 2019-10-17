<?php

spl_autoload_register();
use Database\PDODatabase;

class User {
    private $username;
    private $password;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    private function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    private function setPassword($password)
    {
        $this->password = $password;
    }
}

$pdo = new PDO("mysql:host=localhost:3306; dbname=sessions", "root", "");

$db = new PDODatabase($pdo);
$stmt = $db->query('SELECT * FROM users');
$rs = $stmt->execute();
$allUsers = $rs->fetch(User::class);

/** @var User $user */
foreach ($allUsers as $user) {
    echo 'Username: '. $user->getUsername()
        .' Password: '. $user->getPassword() . '<br/>';
}

//$query = $pdo->prepare('SELECT * FROM users');
//$query->execute();
//$allUsers = $query->fetchObject(User::class);

//foreach ($allUsers as $user) {
//    echo 'Username: '. $user['username']
//        .' Password: '. $user['password'] . '<br/>';
//}

///** @var User $user */
//while($user = $query->fetchObject(User::class)){
//    echo $user->getUsername() .' '. $user->getPassword() . '<br/>';
//}
