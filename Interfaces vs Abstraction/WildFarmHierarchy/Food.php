<?php

abstract class Food
{
	private $quantity;

	public function __construct(int $quantity)
	{
		$this->setQuantity($quantity);
	}

	public function getQuantity()
	{
		return $this->quantity;
	}

	private function setQuantity(int $quantity)
	{
		$this->$quantity = $quantity;
	}
}