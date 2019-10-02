<?php

namespace Abstractions;

abstract class Animal
{
    /**
     * @var string
     */
    private $animalName;
    /**
     * @var string
     */
    private $animalType;
    /**
     * @var float
     */
    private $animalWeight;
    /**
     * @var float
     */
    private $foodEaten;

    public function __construct(string $animalName, string $animalType, float $animalWeight)
    {
        $this->setAnimalName($animalName);
        $this->setAnimalType($animalType);
        $this->setAnimalWeight($animalWeight);
        $this->foodEaten = 0;
    }

    /**
     * @return mixed
     */
    public function getAnimalName()
    {
        return $this->animalName;
    }

    /**
     * @param mixed $animalName
     */
    private function setAnimalName($animalName): void
    {
        $this->animalName = $animalName;
    }

    /**
     * @return mixed
     */
    public function getAnimalType()
    {
        return $this->animalType;
    }

    /**
     * @param mixed $animalType
     */
    private function setAnimalType($animalType): void
    {
        $this->animalType = $animalType;
    }

    /**
     * @return mixed
     */
    public function getAnimalWeight()
    {
        return $this->animalWeight;
    }

    /**
     * @param mixed $animalWeight
     */
    private function setAnimalWeight($animalWeight): void
    {
        $this->animalWeight = $animalWeight;
    }

    /**
     * @return float
     */
    public function getFoodEaten(): float
    {
        return $this->foodEaten;
    }

    /**
     * @param float $foodEaten
     */
    protected function setFoodEaten(float $foodEaten): void
    {
        $this->foodEaten += $foodEaten;
    }

    public abstract function makeSound() : void ;

    public abstract function eat(Food $food) : void ;
}