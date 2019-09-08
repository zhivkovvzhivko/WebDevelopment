<?php

require_once('Animal.php');
require_once('Food.php');
require_once('Mammal.php');
require_once('Vegetable.php');
require_once('Meat.php');
require_once('Mouse.php');
require_once('Felime.php');
require_once('Zebra.php');
require_once('Cat.php');
require_once('Tiger.php');

$command = trim(fgets(STDIN));
$row = 1;

while ($command != 'End') {
	$row++;

	if ($row % 2 == 0) {
		$animalInfo = explode(' ', $command);
		$animalType = $animalInfo[0];
		$animalName = $animalInfo[1];
		$animalWeight = $animalInfo[2];
		$animalLivingRegion = $animalInfo[3];

		if ($animalType == 'Cat') {
			$catBreed = $animalInfo[4];
		}
		if ($animalType == 'Cat') {
			$animal = new Cat($animalType, $animalName, doubleval($animalWeight), $animalLivingRegion, $catBreed);
		} elseif ($animalType == 'Mouse') {
			$animal = new Mouse($animalType, $animalName, doubleval($animalWeight), $animalLivingRegion);
		} elseif ($animalType == 'Zebra') {
			$animal = new Zebra($animalType, $animalName, doubleval($animalWeight), $animalLivingRegion);
		} elseif ($animalType == 'Tiger') {
			$animal = new Tiger($animalType, $animalName, doubleval($animalWeight), $animalLivingRegion);
		}
	} else {
		$foodInfo = explode(' ', $command);
		$foodType = $foodInfo[0]; 
		$foodQuantity = $foodInfo[1];

		if ($foodType == 'Vegetable') {
			$food = new Vegetable(intval($foodQuantity));
		} elseif ($foodType == 'Meat') {
			$food = new Meat(intval($foodQuantity));
		}

		$animal->eatFood($food);

		echo $animal . PHP_EOL;
	}

	$command = trim(fgets(STDIN));
}