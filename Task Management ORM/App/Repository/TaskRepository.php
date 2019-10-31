<?php

namespace App\Repository;

use App\Data\TaskDTO;
use Database\DatabaseInterface;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * TaskRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    /**
     * @return \Generator|TaskDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query("
            SELECT 
                id, 
                title, 
                description, 
                location, 
                user_id, 
                category_id,
                started_on, 
                due_date 
            FROM tasks
        ")->execute()
        ->fetch(TaskDTO::class);
    }

    public function findOne(int $id): TaskDTO
    {
        return $this->db->query("
            SELECT 
                id, 
                title, 
                description, 
                location, 
                user_id, 
                category_id, 
                started_on, 
                due_date 
            FROM tasks
            WHERE id = ?
        ")->execute([$id])
            ->fetch(TaskDTO::class)
            ->current();
    }

    public function insert(TaskDTO $taskDTO): bool
    {
        $this->db->query("
            INSERT INTO tasks (id, title, description, location, user_id, category_id, started_on, due_date)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?)
        ")->execute([
            $taskDTO->getId(),
            $taskDTO->getTitle(),
            $taskDTO->getDescription(),
            $taskDTO->getLocation(),
            $taskDTO->getAuthor()->getId(),
            $taskDTO->getCategory()->getId(),
            $taskDTO->getStartedOn(),
            $taskDTO->getDueDate()
        ]);

        return true;
    }

    public function update(TaskDTO $taskDTO, int $id): bool
    {
        $this->db->query("
            UPDATE tasks 
            SET 
                id = ?,
                title = ?, 
                description = ?, 
                location = ?, 
                user_id = ?, 
                category_id = ?, 
                started_on = ?,
                due_date = ?
            WHERE id = ?
        ")->execute([
            $taskDTO->getId(),
            $taskDTO->getTitle(),
            $taskDTO->getDescription(),
            $taskDTO->getLocation(),
            $taskDTO->getAuthor()->getId(),
            $taskDTO->getCategory()->getId(),
            $taskDTO->getStartedOn(),
            $taskDTO->getDueDate(),
            $id
        ]);

        return true;
    }

    public function remove(int $id): bool
    {
        $this->db->query("DELETE FROM tasks WHERE id = ?")->execute([$id]);
        return true;
    }
}