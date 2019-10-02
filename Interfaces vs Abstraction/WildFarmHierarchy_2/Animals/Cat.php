<?php

namespace Animals;

use Abstractions\Felime;
use Abstractions\Food;

class Cat extends Felime
{
    /**
     * string
     */
    private $breed;

    public function __construct(string $animalName, string $animalType, float $animalWeight, string $livingRegion, $breed)
    {
        parent::__construct($animalName, $animalType, $animalWeight, $livingRegion);
        $this->setBreed($breed);
    }

    /**
     * @return mixed
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * @param mixed $breed
     */
    public function setBreed($breed): void
    {
        $this->breed = $breed;
    }

    public function makeSound(): void
    {
        echo 'Meowww' . PHP_EOL;
    }

    public function eat(Food $food): void
    {
        $this->setFoodEaten($food->getQuantity());
    }

    public function __toString()
    {
        return sprintf("%s[%s, %s, %s, %s, %s] \n",
            $this->getAnimalName(),
            $this->getAnimalType(),
            $this->getBreed(),
            $this->getAnimalWeight(),
            $this->getLivingRegion(),
            $this->getFoodEaten());
    }
}