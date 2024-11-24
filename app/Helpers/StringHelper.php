<?php

namespace App\Helpers;

class StringHelper
{
    public static function removeSlashes(string|null $string): string|null
    {
        if (is_null($string)) return null;
        return str_replace('/', '', $string);
    }
}
