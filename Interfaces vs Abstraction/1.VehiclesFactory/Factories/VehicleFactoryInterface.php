<?php

namespace Factories;

use Vehicles\VehicleInterface;

interface VehicleFactoryInterface
{
    /**
     * @param string $type
     * @param float $quantity
     * @param float $consumption
     * @throws \Exception
     * @return VehicleInterface
     */
    public function create(string $type, float $quantity, float $consumption): VehicleInterface;
}