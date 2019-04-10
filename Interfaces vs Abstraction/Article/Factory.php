<?php

class Factory
{
    public static function getWriter(string $writer_name) : WriterInterface {

        if (!class_exists($writer_name)){
            throw new Exception('Non valid writer');
        }

        /** @var WriterInterface $writer */
        return new $writer_name();
    }
}
