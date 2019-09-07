<?php

abstract class Animal
{
	protected $animalName;
	protected $animalType;
	protected $animalWeight;
	protected $foodEaten = 0;

	public function __construct(string $animalName, string $animalType, float $animalWeight)
	{
		$this->setName($animalName);
		$this->setType($animalType);
		$this->setWeight($animalWeight);
	}

	protected function setName(string $animalName)
	{
		$this->animalName = $animalName;
	}

	protected function setType(string $animalType)
	{
		$this->animalType = $animalType;
	}
	
	protected function setWeight(float $animalWeight)
	{
		$this->animalWeight = $animalWeight;
	}

	public function makeSound()
	{
		echo 'Animal sound';
	}

	public function eatFood(Food $food)
	{
		$this->foodEaten = $food->getQuantity();
	}
}