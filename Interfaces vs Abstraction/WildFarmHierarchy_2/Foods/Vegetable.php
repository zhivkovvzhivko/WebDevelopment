<?php

namespace Foods;

use Abstractions\Food;

class Vegetable extends Food
{

    public function __construct($quantity)
    {
        parent::__construct($quantity);
    }

    public function getClassName(): string
    {
        $func = new \ReflectionClass($this);
        $foodClassName = str_replace('Foods\\', '', $func->getName());
        return $foodClassName;
    }
}