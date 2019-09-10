<?php

class Engineer
{

	private $repairs = [];
	
	public function __construct(array $repairs)
	{
		$this->setRepairs($repairs);
	}

	public function getRepairs()
	{
		return $this->repairs;
	}

	public function setRepairs($repairs)
	{
		return $this->repairs = $repairs;
	}

	public function __toString()
	{
		// TODO
	}
}