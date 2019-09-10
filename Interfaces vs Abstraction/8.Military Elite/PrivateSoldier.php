<?php

class PrivateSoldier extends Soldier
{
	private $salary;

	public function __construct($id, $firstName, $lastName, $salary)
	{
		parent::__construct($id, $firstName, $lastName);
		$this->setSalary($salary);
	}

	public function getSalary()
	{
		return $this->salary;
	}

	private function setSalary($salary)
	{
		return $this->salary = $salary;
	}

	public function __toString()
	{
		return parent::__toString() .' '. $this->getSalary();
	}
}