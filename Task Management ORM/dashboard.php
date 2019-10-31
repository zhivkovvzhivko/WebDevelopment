<?php

require_once 'common.php';

$homeHttpHandler = new \App\Http\HomeHttpHandler($template, new \Core\DataBinder());
$homeHttpHandler->dashboard();