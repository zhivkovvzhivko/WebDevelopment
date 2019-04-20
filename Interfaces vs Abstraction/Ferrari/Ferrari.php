<?php

require_once('ICar.php');

class Ferrari implements ICar
{

	private $driver;
	private $model;

	public function __construct(string $driver, string $model='488-Spider')
	{
		$this->driver = $driver;
		$this->model = $model;
	}

	public function Brakes(): string
	{
		return 'Brakes!';
	}

	public function Gas(): string
	{
		return 'Zadu6avam sA!';
	}

	public function Driver(): string
	{
		return $this->driver;
	}

	public function getModel(): string
	{
		return $this->model;
	}

	public function __toString()
	{
		return "{$this->getModel()}/{$this->Brakes()}/{$this->Gas()}/{$this->Driver()}";
	}
}

$driverName = 'Bat Giorgi';
$ferrari = new Ferrari($driverName);
echo $ferrari;
