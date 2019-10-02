<?php

namespace Abstractions;

abstract class Mammal extends Animal
{
    /**
     * string
     */
    private $livingRegion;

    public function __construct(string $animalName, string $animalType, float $animalWeight, string $livingRegion)
    {
        parent::__construct($animalName, $animalType, $animalWeight);
        $this->setLivingRegion($livingRegion);
    }

    /**
     * @return mixed
     */
    public function getLivingRegion()
    {
        return $this->livingRegion;
    }

    /**
     * @param mixed $livingRegion
     */
    protected function setLivingRegion($livingRegion): void
    {
        $this->livingRegion = $livingRegion;
    }

    public function __toString()
    {
        return sprintf("%s[%s, %s, %s, %s] \n",
            $this->getAnimalName(),
            $this->getAnimalType(),
            $this->getAnimalWeight(),
            $this->getLivingRegion(),
            $this->getFoodEaten());
    }
}