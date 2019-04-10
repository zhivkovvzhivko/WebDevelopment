<?php

include_once('Car.php');
include_once('Engine.php');
include_once('Cargo.php');
include_once('Tire.php');

$carsCount = trim(fgets(STDIN));
$cars = array();

for($i=0; $i < $carsCount; $i++) {
    $carInfo = explode(' ', trim(fgets(STDIN)));

    list($model, $engineSpeed, $enginePower, $cargoWeight, $cargoType, $tire1Pressure, $tire1Age,
        $tire2Pressure, $tire2Age, $tire3Pressure, $tire3Age, $tire4Pressure, $tire4Age) = $carInfo;
//    var_dump($model);

    $engine = new Engine(intval($engineSpeed), intval($enginePower));
    $cargo = new Cargo(intval($cargoWeight), intval($cargoType));
    $tire1 = new Tire(floatval($tire1Pressure), intval($tire1Age));
    $tire2 = new Tire(floatval($tire2Pressure), intval($tire2Age));
    $tire3 = new Tire(floatval($tire3Pressure), intval($tire3Age));
    $tire4 = new Tire(floatval($tire4Pressure), intval($tire4Age));

    $tires = [$tire1, $tire2, $tire3, $tire4];

    $cars[] = new Car($model, $engine, $cargo, $tires);
}

$command = trim(fgets(STDIN));

if ($command == 'fragile'){
    foreach ($cars as $car ){
        if ($car->getCargo()->getType() == 'fragile'){
            foreach($car->getTires() as $tire){
                if ($tire->getPressure() < 1){
                    echo $car->getModel(). PHP_EOL;
                    break;
                }
            }
        }
    }
} elseif ($command == 'flamable'){
    foreach ($cars as $car){
        if ($car->getCargo()->getType() == 'flamable'){
            if ($car->getEngine()->power > 250){
                echo $car->getModel(). PHP_EOL;
            }
        }
    }
}
