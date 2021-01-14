<?php

require_once 'common.php';

//$userHttpHandler = new \App\Http\HttpHandler($template, new \Core\DataBinder());
$userHttpHandler->login($userService, $_POST);