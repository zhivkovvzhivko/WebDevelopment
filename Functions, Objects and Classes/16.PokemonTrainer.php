<?php

class Trainer
{
	private $name;
	private $badges; 
	private $pokemons = [];

	public function __construct(string $name, int $badges = 0)
	{
		$this->name = $name;
		$this->badges = $badges;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getBadges()
	{
		return $this->badges;
	}

	public function setBadges($badge)
	{
		return $this->badges += $badge;
	}

	public function getPokemons()
	{
		return $this->pokemons;
	}

	public function setPokemon(Pokemon $pokemon)
	{
		$this->pokemons[] = $pokemon;
	}

	public function deletePokemon($pokemonName)
	{
		unset($this->pokemons[$pokemonName]);
	}
}

class Pokemon
{
	private $name;
	private $element;
	private $health;

	public function __construct(string $name, string $element, int $health)
	{
		$this->name = $name;
		$this->element = $element;
		$this->health = $health;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getElement()
	{
		return $this->element;	
	}

	public function setElement($element)
	{
		$this->element = $element;
	}

	public function getHealth()
	{
		return $this->health;	
	}

	public function setHealth($health)
	{
		$this->health = $health;
	}

	public function decreaseHealth($health)
	{
		$newHealth = $this->getHealth() - $health;
		$this->setHealth($newHealth);
	}
}


$trainers = [];

while (true) {
	$input = explode(' ', readline());

	if ($input[0] != 'Tournament') {

		$trainerName = $input[0];
		$pokemonName = $input[1];
		$pokemonElement = $input[2];
		$pokemonHealth = $input[3];

		$pokemon = new Pokemon($pokemonName, $pokemonElement, $pokemonHealth);
		$trainer = new Trainer($trainerName);

		if (!isset($trainers[$trainerName])) {
			$trainers[$trainerName] = $trainer;
			$trainer->setPokemon($pokemon);
		} else {
			$trainers[$trainerName]->setPokemon($pokemon);
		}
	} elseif ($input[0] == 'Tournament') {

		$pokemonElements = [];
		$element = readline();
		while ($element != 'End') {

			foreach ($trainers as $trainer) {
				foreach ($trainer->getPokemons() as $pokemon) {
					$pokemonElements[] = $pokemon->getElement();
				}

				if (in_array($element, $pokemonElements)) {
					$trainer->setBadges(1);
				} else {
					foreach ($trainer->getPokemons() as $pokemon) {
						if ($pokemon->getHealth() > 0) {
							$pokemon->decreaseHealth(10);
						} else {
							$trainer->deletePokemon($pokemon->getName());
						}
					}
				}
				
				$pokemonElements = [];
			}

			$element = readline();
		}

		if($element == 'End') {
			usort($trainers, function (Trainer $t1, Trainer $t2){
					return $t2->getBadges() <=> $t1->getBadges();
			});

			foreach ($trainers as $trainer) {
				echo $trainer->getName(),' ', $trainer->getBadges(),' ', count($trainer->getPokemons()), "\n";
			}

			exit;
		}
	}
}

