<?php

class Tire
{
    private $pressure;
    private $age;

    /**
     * Tire constructor.
     * @param $pressure
     * @param $age
     */
    public function __construct(float $pressure, int $age)
    {
        $this->pressure = $pressure;
        $this->age = $age;
    }

    /**
     * @return float
     */
    public function getPressure(): float
    {
        return $this->pressure;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
}