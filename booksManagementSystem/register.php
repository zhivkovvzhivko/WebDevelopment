<?php
require_once 'common.php';

$usersRolesService = new \App\Service\UsersRolesService(new \App\Repository\UsersRolesRepository($db));
$userHttpHandler->register($userService, $usersRolesService, $_POST);
