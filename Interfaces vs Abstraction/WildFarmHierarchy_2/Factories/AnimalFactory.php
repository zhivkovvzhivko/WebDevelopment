<?php

namespace Factories;

use Animals\Cat;
use Animals\Tiger;
use Animals\Mouse;
use Animals\Zebra;

class AnimalFactory
{
    public static function getAnimal(array $data) {
        $animalType = $data[0];
        $animalName = $data[1];
        $animalWeight = floatval($data[2]);
        $livingRegion = $data[3];

        switch (strtolower($animalType)) {
            case 'cat':
                $catBreed = $data[4];
                return new Cat($animalType, $animalName, $animalWeight, $livingRegion, $catBreed);
//                return new $animalType($animalType, $animalName, $animalWeight, $livingRegion, $catBreed);
            case 'tiger':
                return new Tiger($animalType, $animalName, $animalWeight, $livingRegion);
            case 'mouse':
                return new Mouse($animalType, $animalName, $animalWeight, $livingRegion);
            case 'zebra':
                return new Zebra($animalType, $animalName, $animalWeight, $livingRegion);
//                return new $animalType($animalType, $animalName, $animalWeight, $livingRegion);
            default:
                return null;
        }
    }
}