<?php

require_once 'common.php';

$taskRepository = new \App\Repository\TaskRepository($db, new \Core\DataBinder());
$taskService = new \App\Service\TaskService($taskRepository);

$homeHttpHandler = new \App\Http\HomeHttpHandler($template, new \Core\DataBinder());
$homeHttpHandler->dashboard($taskService);