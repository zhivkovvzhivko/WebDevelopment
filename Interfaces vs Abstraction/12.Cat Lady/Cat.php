<?php

abstract class Cat
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $breed;

    protected function __construct($breed, $name)
    {
        $this->setBreed($breed);
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * @param string $breed
     */
    public function setBreed($breed)
    {
        $this->breed = $breed;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return "{$this->getBreed()} {$this->getName()} ";
    }
}