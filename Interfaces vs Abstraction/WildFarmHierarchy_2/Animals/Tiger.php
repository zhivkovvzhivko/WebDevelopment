<?php

namespace Animals;

use Abstractions\Felime;
use Abstractions\Food;

class Tiger extends Felime
{

    public function makeSound(): void
    {
        echo 'ROAAR' . PHP_EOL;
    }

    /**
     * @param Food $food
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function eat(Food $food): void
    {
        $foodClass = new \ReflectionClass($food); // Meat or Vegetable

        $func = new \ReflectionClass($this);
        $className = str_replace('Animals\\', '', $func->getName());

        if ($foodClass->getName() == 'Meat') {

        } else {
            throw new \Exception($className . "s are not eating that type of food!\n");
        }
        $this->setFoodEaten($food);
    }
}