<?php

class Repair
{
	private $partName;
	private $hoursWorked;

	public function __construct(string $partName, int $hoursWorked)
	{
		$this->setPartName($partName);
		$this->setHoursWorked($hoursWorked);
	}

	public function getPartName()
	{
		return $this->partName;
	}

	public function setPartName($partName)
	{
		return $this->partName = $partName;
	}

	public function getHoursWorked()
	{
		return $this->hoursWorked;
	}

	public function setHoursWorked($hoursWorked)
	{
		return $this->hoursWorked = $hoursWorked;
	}

	public function __toString()
	{
		return "Part Name: {$this->getPartName()} Hours Worked: {$this->setPartName()}";
	}
}