<?php

class Factory
{
    public static function getCat(array $data) : Cat
    {
        [$catBreed, $catName, $param] = $data;

        if (class_exists($catBreed)) {
            return new $catBreed($catBreed, $catName, $param);
        } else {
            throw new Exception('There is no breed: '. $catBreed);
        }
    }
}