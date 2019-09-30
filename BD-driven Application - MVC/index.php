<?php

use Db\DBConnection;

spl_autoload_register();

$url = $_SERVER['REQUEST_URI'];

$url_data = explode('/', $url);
array_shift($url_data);
array_shift($url_data);
array_shift($url_data);

$controller = $url_data[0] ?? 'index.php';
$action =  $url_data[1] ?? 'index.php';
$param = $url_data[2] ?? null;

$controller = 'Controllers\\' . ucfirst($controller) . 'Controller';

$db = DBConnection::getConnection();

if (!class_exists($controller)){
    throw new Exception('Non valid controller');
}
$controller_obj = new $controller($db);
$controller_obj->$action($param);
