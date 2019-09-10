<?php

class Soldier
{
	protected $id;
	protected $firstName;
	protected $lastName;

	public function __construct($id, $firstName, $lastName)
	{
		$this->setId($id);
		$this->setFirstName($firstName);
		$this->setLastName($lastName);
	}

	public function getId()
	{
		return $this->id;	
	}

	protected function setId($id)
	{
		$this->id = $id;
	}

	protected function getFirstName()
	{
		return $this->firstName;
	}

	protected function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	protected function setLastName($lastName)
	{
		return $this->lastName = $lastName;
	}

	public function __toString()
	{
		return 'Name:'. $this->firstName .' '. $this->lastName .' '. $this->id;
	}
}