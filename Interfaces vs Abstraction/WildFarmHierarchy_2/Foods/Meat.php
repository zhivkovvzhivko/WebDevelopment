<?php

namespace Foods;

use Abstractions\Food;

class Meat extends Food
{
    public function __construct($quantity)
    {
        parent::__construct($quantity);
    }

    public function getClassName() : string
    {
        $func = new \ReflectionClass($this);
        return $func->getName();
    }
}
