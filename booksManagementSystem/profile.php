<?php

require_once 'common.php';

$userHttpHandler = new \App\Http\HttpHandler($template, new \Core\DataBinder());
$userHttpHandler->profile($userService, $_POST);