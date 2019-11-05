<?php

namespace App\Data;

class PDOValidator
{
    public static function validate(int $min, int $max, string $field, string $errorMsg) {
        if (mb_strlen($field) < $min || mb_strlen($field) > $max) {
            throw new \Exception($errorMsg);
        }
    }
}