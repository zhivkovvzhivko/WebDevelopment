<?php

class Person
{
	private $name;
	private $age;

	public function __construct($name, $age)
	{
		$this->setName($name);
		$this->setAge($age);
	}

	public function getName()
	{
		return $this->name;	
	}

	protected function setName($name)
	{
		$this->name = $name;
	}

	public function getAge()
	{
		return $this->age;
	}

	protected function setAge($age)
	{
		if ($age < 1) {
			throw new Exception('Age must be positive!');
		}

		$this->age = $age;
	}

}
