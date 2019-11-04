<?php

namespace App\Http;

use App\Data\EditDTO;
use App\Data\TaskDTO;
use App\Service\CategoryService;
use App\Service\CategoryServiceInterface;
use App\Service\TaskService;
use App\Service\TaskServiceInterface;
use App\Service\UserService;
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

        if(isset($formData['save'])) {
            $this->handleInsertProcess($taskService, $userService, $categoryService, $formData);
        } else {
            $this->render('tasks/add', $editDTO);
        }
    }

    private function handleInsertProcess(TaskServiceInterface $taskService, UserServiceInterface $userService, CategoryServiceInterface $categoryService, $formData)
    {
        /**
         * @var TaskDTO $task
         */
        $task = $this->dataBinder->bind($formData, TaskDTO::class);


        /** @var UserService $userService */
        $author = $userService->currentUser();

        /** @var CategoryService $categoryService */
        $category = $categoryService->getOne(intval($formData['category_id']));

        $task->setAuthor($author);
        $task->setCategory($category);
//        $taskService->add($task);

        /** @var TaskService $taskService */
        $taskService->add($task);
        $this->redirect('dashboard.php');
    }
}