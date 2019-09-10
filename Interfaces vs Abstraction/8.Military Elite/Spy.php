<?php

class Spy extends Soldier
{
	private $codeNumber;

	function __construct($codeNumber)
	{
		$this->setCodeNumber($codeNumber);
	}

	public function getCodeNumber()
	{
		return $this->codeNumber;
	}

	private function setCodeNumber($codeNumber)
	{
		$this->codeNumber = $codeNumber;
	}

	public function __toString()
	{
		// TODO
		return parent::__toString() . "\n Code Number:{$this->getCodeNumber()}";
	}
}