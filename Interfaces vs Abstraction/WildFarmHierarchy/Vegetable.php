<?php

class Vegetable extends Food
{

	private $foodType = 'Vegetable';

	public function getFoodType()
	{
		return $this->foodType;
	}
}