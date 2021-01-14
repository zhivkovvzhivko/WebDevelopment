<?php

require_once 'common.php';

$userHttpHandler = new \App\Http\HttpHandler($template);
$userHttpHandler->index($userService);