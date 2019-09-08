<?php

class Cat extends Felime
{
	private $breed;

	public function __construct(string $animalType, string $animalName, float $animalWeight, $animalLivingRegion, string $breed)
	{
		parent::__construct($animalName, $animalType, $animalWeight, $animalLivingRegion);
		$this->setBreed($breed);
	}

	private function setBreed(string $breed)
	{
		$this->breed = $breed;
	}

	public function makeSound()
	{
		echo 'Meowwww' . PHP_EOL;
	}

	public function eatFood(Food $food)
	{
		$this->makeSound() . PHP_EOL;
		$this->foodEaten =+ $food->getQuantity();
	}

	public function __toString()
	{
		return $this->animalType .'['. $this->animalName .', '. $this->breed . ', '
		. $this->animalWeight .', '. $this->livingRegion .', '. $this->foodEaten . ']';
	}
}