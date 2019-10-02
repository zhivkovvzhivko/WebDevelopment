<?php

namespace Abstractions;

abstract class Food
{
    /**
     * @var int
     */
    private $quantity;

    protected function __construct($quantity)
    {
        $this->setQuantity($quantity);
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public abstract function getClassName() : string;
}