<?php

class StreetExtraordinaire extends Cat
{

    private $decibelsOfMeows;

    public function __construct($breed, $name, $decibelsOfMeows)
    {
        parent::__construct($breed, $name);
        $this->setDecibelsOfMeows($decibelsOfMeows);
    }

    /**
     * @return mixed
     */
    public function getDecibelsOfMeows()
    {
        return $this->decibelsOfMeows;
    }
    /**
     * @param mixed $decibelsOfMeows
     */
    public function setDecibelsOfMeows($decibelsOfMeows)
    {
        $this->decibelsOfMeows = $decibelsOfMeows;
    }

    public function __toString()
    {
        return parent::__toString() . $this->getDecibelsOfMeows();
    }


}