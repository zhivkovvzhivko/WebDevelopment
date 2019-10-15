<?php

namespace Vehicles;

interface VehicleInterface
{
    public function drive(float $distance): string;

    public function refuel(float $litres): void;
}
