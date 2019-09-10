<?php

class Spy
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
		return 'Name:'. $this->firstName .' '. $this->lastName .' '. $this->id .' '. $this->getCodeNumber();
	}
}