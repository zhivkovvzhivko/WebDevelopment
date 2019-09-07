<?php

class Meat extends Food
{
	
	private $foodType = 'Meat';

	public function getFoodType()
	{
		return $this->foodType;
	}
}