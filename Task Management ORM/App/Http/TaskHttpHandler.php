<?php

namespace App\Http;

use App\Data\EditDTO;
use App\Data\TaskDTO;
use App\Service\CategoryServiceInterface;
use App\Service\TaskServiceInterface;
use App\Service\UserServiceInterface;

class TaskHttpHandler extends HttpHandlerAbstract
{
    public function add (TaskServiceInterface $taskService,
                         UserServiceInterface $userService,
                         CategoryServiceInterface $categoryService,
                         array $formData = [])
    {

        /** @var EditDTO $taskDTO */
        $task = $this->dataBinder->bind($formData, TaskDTO::class);
        $editDTO = new EditDTO();
        $editDTO->setTask($task);
        $editDTO->setCategories($categoryService->getAll());

        foreach($categoryService->getAll() as $category) {
//            echo '<pre/>'; print_r([
//                'category' => $category,
//                'name' => $category->getName()
//            ]);
        }

//var_dump($categoryService->getAll());
//echo '<pre/>'; print_r($editDTO);

        if(isset($formData['save'])) {
            $this->handleInsertProcess($taskService, $userService, $categoryService, $formData);
        } else {
            $this->render('tasks/add', $editDTO);
        }
    }

    private function handleInsertProcess(TaskServiceInterface $taskService, UserServiceInterface $userService, CategoryServiceInterface $categoryService, $formData)
    {
        /**
         * $var TaskService $taskService
         */
        $task = $this->dataBinder->bind($formData, TaskDTO::class);
    }
}