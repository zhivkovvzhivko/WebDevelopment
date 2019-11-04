<?php

require_once 'common.php';

$taskRepository = new \App\Repository\TaskRepository($db);
$taskService = new \App\Service\TaskService($taskRepository);

$homeHttpHandler = new \App\Http\HomeHttpHandler($template, new \Core\DataBinder());
$homeHttpHandler->dashboard($taskService);