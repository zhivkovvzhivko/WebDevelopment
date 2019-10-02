<?php

namespace Animals;

use Abstractions\Mammal;
use Abstractions\Food;

class Mouse extends Mammal
{

    public function makeSound(): void
    {
        echo 'SQUEEEAAAK' . PHP_EOL;
    }

    /**
     * @param Food $food
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function eat(Food $food): void
    {
        $func = new \ReflectionClass($this);
        $className = str_replace('Animals\\', '', $func->getName());

        if ($food->getClassName() == 'Vegetable') {
            $this->setFoodEaten($food->getQuantity());
        } else {
            throw new \Exception($className . "s are not eating that type of food!\n");
        }
    }
}