<?php

require_once 'common.php';

$userBooksService = new \App\Service\UserBooksService(new \App\Repository\UserBooksRepository($db));
$userBooksHandler = new \App\Http\UserBooksHttpHandler($template, new \Core\DataBinder());

$userBooksHandler->delete($userBooksService, $_GET);