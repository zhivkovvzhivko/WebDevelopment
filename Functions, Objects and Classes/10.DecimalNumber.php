<?php

class DecimalNumber
{
    private $number;

    /**
     * DecimalNumber constructor.
     * @param $number
     */
    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function reverse(){
        return strrev($this->number);
    }
}

$num = readline();
$number = new DecimalNumber();
$number->reverse();
