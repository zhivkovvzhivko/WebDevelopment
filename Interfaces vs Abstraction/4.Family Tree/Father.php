<?php

class Father 
{
	protected $yearBirth;
	protected $yearDead;
	protected $name;

	public function __construct($name, $yearDead, $yearBirth)
	{
		$this->setName($name);
		$this->setYearBirth($yearBirth);
		$this->setYearDead($yearDead);
	}

	public function getName()
	{
		return $this->name;	
	}

	protected function setName($name)
	{
		if (strlen($name) < 3) {
			throw new Exception('The name should be at least 3 characters');
		}

		$this->name = $name;
	}

	protected function getYearBirth()
	{
		return $this->yearBirth;
	}

	protected function setYearBirth($yearBirth)
	{
		$this->yearBirth = $yearBirth;
	}

	protected function getYearDead()
	{
		return $this->yearDead;
	}

	protected function setYearDead($yearDead)
	{
		$this->yearDead = $yearDead;
	}

	protected function getName()
	{
		return $this->name;
	}

	protected function setName($name)
	{
		$this->name = $name;
	}

	public function getTimeLived()
	{
		return $this->getYearDead() - $this->getYearBirth();
	}

	public function getGenerationNum()
	{
		return 1;
	}
}