<?php

namespace App\Service;

use App\Data\TaskDTO;
use App\Repository\TaskRepositoryInterface;
use mysql_xdevapi\Exception;

class TaskService implements TaskServiceInterface
{
    /*
     * $var TaskRepositoryInterface
     */
    private $taskRepository;

    /**
     * TaskService constructor.
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return \Generator|TaskDTO[]
     */
    public function getAll(): \Generator
    {
        $this->taskRepository->findAll();
    }

    public function getOne(int $id): TaskDTO
    {
        $task = $this->taskRepository->findOne($id);

        if($task === null) {
            throw new \Exception('Task not exist');
        }

        return $task;
    }

    public function add(TaskDTO $taskDTO): bool
    {
        return $this->taskRepository->insert($taskDTO);
    }

    public function edit(TaskDTO $taskDTO, $id): bool
    {
        $task = $this->taskRepository->findOne($id);

        if($task === null) {
            throw new \Exception('Task not exist');
        }

        return $this->taskRepository->update($taskDTO, $id);
    }

    public function delete(int $id): bool
    {
        $task = $this->taskRepository->findOne($id);

        if($task === null) {
            throw new \Exception('Task not exist');
        }

        return $this->taskRepository->remove($id);
    }
}