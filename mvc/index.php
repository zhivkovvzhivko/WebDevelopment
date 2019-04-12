<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
spl_autoload_register();

$path =  '/WebDevelopmentBasics/' .basename(__DIR__) . '/';
$url_parts = explode('/', str_replace($path, '', $_SERVER['REQUEST_URI']));

$controller_name = ucfirst(array_shift($url_parts));
$action_name = array_shift($url_parts);
$params = $url_parts;

$request = new \Core\Request\Request($controller_name, $action_name, $params);
$view = new \Core\View\View($request);

$app = new Core\App\Application($request);
$app->run($view);
