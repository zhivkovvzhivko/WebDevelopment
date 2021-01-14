<?php

require_once 'common.php';
$error = ' greshka';
$userBookService = new \App\Service\UserBooksService(new \App\Repository\UserBooksRepository($db));
$userBookHttpHandler = new \App\Http\UserBooksHttpHandler($template, new \Core\DataBinder());

$userBookHttpHandler->myBooks($userBookService, $_SESSION['id']);
