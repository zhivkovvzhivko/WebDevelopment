<?php

require_once 'common.php';

$userBooksService = new \App\Service\UserBooksService(new \App\Repository\UserBooksRepository($db));

$userBooksHttpHandler = new \App\Http\UserBooksHttpHandler($template, new \Core\DataBinder());
$userBooksHttpHandler->add($userBooksService, $_GET);
