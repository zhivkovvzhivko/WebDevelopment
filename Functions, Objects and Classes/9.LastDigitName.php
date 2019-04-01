<?php

class Number {
    private $number;

    /**
     * Number constructor.
     * @param $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    public function getNameLastDigit() {

        switch ($this->number % 10){
            case 0:
                echo 'zero';
                break;
            case 1:
                echo 'one';
                break;
            case 2:
                echo 'two';
                break;
            case 3:
                echo 'three';
                break;
            case 4:
                echo 'four';
                break;
            case 5:
                echo 'five';
                break;
            case 6:
                echo 'six';
                break;
            case 7:
                echo 'eight';
                break;
            case 9:
                echo 'nine';
                break;
            default:
                break;
        }
    }
}

$num = 1234;
//$num = intval(readline());
$number = new Number($num);
$number->getNameLastDigit();