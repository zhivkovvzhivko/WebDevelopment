<?php

class Zebra extends Mammal
{

	public function makeSound()
	{
		echo 'Zs' . PHP_EOL;
	}

	public function eatFood(Food $food)
	{
		if (!$food->getFoodType() == 'Vegetable') {
			echo 'Zebra are not eating that type of food!';
		} else {
			$this->foodEaten =+ $food->getQuantity();
		}
	}
}