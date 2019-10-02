<?php

use Factories\AnimalFactory;
use Factories\FoodFactory;

//include_once('Factories\AnimalFactory.php');
spl_autoload_register();

class Main
{
    const END = 'End';

    public static function run() {

        $input = readline();
        while ($input != self::END) {
            $animalData = explode(' ', $input);
            $animal = AnimalFactory::getAnimal($animalData);

            $foodData = explode(' ', readline());
            $food = FoodFactory::getFood($foodData);


            $input = readline();

            $animal->makeSound();

            try {
                $animal->eat($food);
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }

            echo $animal;
        }
    }
}

Main::run();