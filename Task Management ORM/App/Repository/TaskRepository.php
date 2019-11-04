<?php

namespace App\Repository;

use App\Data\CategoryDTO;
use App\Data\TaskDTO;
use App\Data\UserDTO;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;
    /**
     * @var DataBinderInterface
     */
    private $dataBinder;

    /**
     * TaskRepository constructor.
     * @param DatabaseInterface $db
     * @param DataBinderInterface $dataBinder
     */
    public function __construct(DatabaseInterface $db, DataBinderInterface $dataBinder)
    {
        $this->db = $db;
        $this->dataBinder = $dataBinder;
    }

    /**
     * @return \Generator|TaskDTO[]
     */
    public function findAll(): \Generator
    {
        $lazyTaskResult =  $this->db->query("
            SELECT 
                t.id AS task_id, 
                t.title, 
                t.description, 
                t.location, 
                u.id AS author_id, 
                u.username, 
                u.password, 
                u.first_name, 
                u.last_name, 
                c.id AS category_id,
                c.name,
                t.started_on, 
                t.due_date 
            FROM tasks t
            INNER JOIN users u ON t.user_id = u.id 
            INNER JOIN categories c ON t.category_id = c.id
            ORDER BY t.due_date DESC, t.id ASC
        ")->execute()
            ->fetch();

        // Binding/mapping columns from DB to DTO
        foreach ($lazyTaskResult as $row) {
            /** @var TaskDTO $task */
            $task = $this->dataBinder->bind($row, TaskDTO::class);
            /** @var UserDTO $author */
            $author = $this->dataBinder->bind($row, UserDTO::class);
            /** @var CategoryDTO $category */
            $category = $this->dataBinder->bind($row, CategoryDTO::class);

            $task->setId($row['task_id']);
            $author->setId($row['author_id']);
            $category->setId($row['category_id']);

            $task->setAuthor($author);
            $task->setCategory($category);

            yield $task;
        }
    }

    public function findOne(int $id): TaskDTO
    {
        $row =  $this->db->query("
            SELECT 
                t.id AS task_id, 
                t.title, 
                t.description, 
                t.location, 
                u.id AS author_id, 
                u.username, 
                u.password, 
                u.first_name, 
                u.last_name, 
                c.id AS category_id,
                c.name,
                t.started_on, 
                t.due_date 
            FROM tasks t
            INNER JOIN users u ON t.user_id = u.id 
            INNER JOIN categories c ON t.category_id = c.id
            ORDER BY t.due_date DESC, t.id ASC
        ")->execute()
            ->fetch()
            ->current();

        // Binding/mapping columns from DB to DTO
        /** @var TaskDTO $task */
        $task = $this->dataBinder->bind($row, TaskDTO::class);
        /** @var UserDTO $author */
        $author = $this->dataBinder->bind($row, UserDTO::class);
        /** @var CategoryDTO $category */
        $category = $this->dataBinder->bind($row, CategoryDTO::class);

        $task->setId($row['task_id']);
        $author->setId($row['author_id']);
        $category->setId($row['category_id']);

        $task->setAuthor($author);
        $task->setCategory($category);
var_dump($task); exit;
        return $task;
    }

    public function insert(TaskDTO $taskDTO): bool
    {
        try {
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
        } catch (\PDOException $e) {
            echo $e->getCode(), $e->getMessage();
        }

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