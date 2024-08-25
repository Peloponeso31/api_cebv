<?php

namespace App\Helpers;

use UnitEnum;

class EnumHelper
{
    /**
     * Get the list of values of the enum class.
     *
     * @param string $enumClass
     * @return array
     */
    public static function toList(string $enumClass): array
    {
        if (!is_subclass_of($enumClass, UnitEnum::class)) {
            throw new \InvalidArgumentException("The $enumClass must be a subclass of UnitEnum");
        }

        return array_map(fn($case) => $case->value, $enumClass::cases());
    }
}
