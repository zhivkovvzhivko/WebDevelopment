<?php

class Mammal extends Animal
{
	protected $livingRegion;

	public function __construct(string $animalName, string $animalType, float $animalWeight, string $livingRegion)
	{
		parent::__construct($animalName, $animalType, $animalWeight);
		$this->setLivingRegion($livingRegion);
	}

	protected function setLivingRegion(string $livingRegion)
	{
		$this->livingRegion = $livingRegion;
	}

	public function __toString()
	{
		return $this->animalName .'['. $this->animalType .', '
		. $this->animalWeight .', '. $this->livingRegion .', '. $this->foodEaten . ']';
	}
}