<?php

require_once 'common.php';

$userBookHttpHandler = new \App\Http\UserBooksHttpHandler($template, new \Core\DataBinder());
$userBookHttpHandler->showMyBooks($_SESSION['id']);