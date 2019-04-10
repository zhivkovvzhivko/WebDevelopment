<?php

class Robot implements IIdentity
{
    private $model;
    private $id;

    /**
     * Robot constructor.
     * @param $model
     * @param $id
     */
    public function __construct($model, $id)
    {
        $this->setModel($model);
        $this->setId($id);
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    private function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    private function setId($id): void
    {
        $this->id = $id;
    }

    public function getFakeId(string $id): string
    {
        $lenght = strlen($id);
        if (substr($this->getId(), -$lenght, $lenght) == $id){
            return $this->getId() . PHP_EOL;
        }
        return '';
    }
}