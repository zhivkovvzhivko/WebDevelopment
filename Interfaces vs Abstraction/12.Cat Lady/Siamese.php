<?php


class Siamese extends Cat
{
    private $earSize;

    public function __construct($breed, $name, $earSize)
    {
        parent::__construct($breed, $name);
        $this->setEarSize($earSize);
    }

    /**
     * @return mixed
     */
    public function getEarSize()
    {
        return $this->earSize;
    }

    /**
     * @param mixed $ear
     */
    public function setEarSize($earSize)
    {
        $this->earSize = $earSize;
    }

    public function __toString()
    {
        return parent::__toString() . $this->getEarSize() . PHP_EOL;
    }


}