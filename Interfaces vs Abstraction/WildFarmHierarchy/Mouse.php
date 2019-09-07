<?php

class Mouse extends Mammal
{
	
	public function makeSound()
	{
		echo 'SQUEEEAAAK!' . PHP_EOL;
	}

	public function eatFood(Food $food)
	{
		if (!$food->getFoodType() == 'Vegetable') {
			echo 'Mouse are not eating that type of food!';
		} else {
			$this->foodEaten =+ $food->getQuantity();
		}
	}
}