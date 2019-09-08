<?php

class Tiger extends Felime
{
	public function makeSound()
	{
		echo 'ROAAR!!!' . PHP_EOL;
	}

	public function eatFood(Food $food)
	{
		$this->makeSound() . PHP_EOL;
		
		if (!$food->getFoodType() == 'Meat') {
			echo 'Tigers are not eating that type of food!' . PHP_EOL;
		} else {
			$this->foodEaten =+ $food->getQuantity();
		}
	}
}