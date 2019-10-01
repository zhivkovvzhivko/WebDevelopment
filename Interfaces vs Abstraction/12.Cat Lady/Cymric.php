<?php

class Cymric extends Cat
{
    private $furLength;

    public function __construct($breed, $name, $furLength)
    {
        parent::__construct($breed, $name);
        $this->setfurLength($furLength);
    }

    /**
     * @return mixed
     */
    public function getfurLength()
    {
        return $this->furLength;
    }

    /**
     * @param mixed $length
     */
    public function setfurLength($furLength)
    {
        $this->furLength = $furLength;
    }

    public function __toString()
    {
        return parent::__toString() . $this->getfurLength() . PHP_EOL;
    }
}