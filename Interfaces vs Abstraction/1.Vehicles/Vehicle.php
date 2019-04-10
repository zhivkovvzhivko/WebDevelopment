<?php

class Application {

    private $vehicles = [];

    public function readData()
    {
        while($line = readline('Type vehicle')){
            if ($line === ''){
                break;
            }

            [$type, $fuel, $consumption] = explode(' ', $line);

            if (!class_exists($type)){
                throw new Exception('Non valid type');
            }
            if (isset()){
                throw new Exception('This type already exists');
            }
            $this->vehicles[$type] = new $type($fuel, $consumption);
        }
    }

    public function printData(){
        while($line = readline('Type operation')) {
            if ($line === '') {
                break;
            }
            [$operation, $type, $data] = explode(' ', $line);

            if (!isset($this->vehicles[$type])){
                throw new Exception('Non valid type');
            }
            if (!is_callable([$this->vehicles[$type], $operation])){
                throw new Exception('Non valid operation');
            }

            $this->vehicles[$type]->$operation($data);
            echo $this->vehicles[$type]->getLastStatus();
        }
    }
}


abstract class Vehicle
{
    /**
     * @var int
     */
    protected $fuel;

    /**
     * @var float
     */
    protected $consumption;

    protected $last_status;

    /**
     * Vehicle constructor.
     * @param $fuel
     * @param $consumption
     */
    public function __construct(int $fuel, float $consumption)
    {
        $this->fuel = $fuel;
        $this->consumption = $consumption;
    }

    public function drive(int $distance){
        $range = $this->getFuel() / $this->getConsumption();
        if ($distance > $range){
            $this->last_status = 'needs refueling';
            return 'false';
        }
        $this->last_status = 'travelled '.$range.' km';
        return $range;
    }

    public function refuel(int $fuel){
        $this->fuel += $fuel;
        $this->last_status = $this->getFuel() + $fuel;
    }

    abstract function getConsumption();

    /**
     * @return int
     */
    protected function getFuel(): int
    {
        return $this->fuel;
    }

    /**
     * @return mixed
     */
    public function getLastStatus()
    {
        return $this->last_status;
    }
}

class Car extends Vehicle{

    public function getConsumption(){
        return $this->consumption + 0.9;
    }
}

class Truck extends Vehicle{

    public function getConsumption(){
        return $this->consumption + 1.6;
    }

    protected function getFuel(): int
    {
        return $this->fuel * 0.95;
    }
}
