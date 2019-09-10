<?php

class Commando
{
	private $missions[];

	public function __construct(array $missions)
	{
		$this->missions = $missions;
	}
}