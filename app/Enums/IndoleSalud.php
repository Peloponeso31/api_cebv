<?php

namespace App\Enums;

use App\Contracts\EnumerableInterface;

enum IndoleSalud: string implements EnumerableInterface
{
    case Fisica = 'Fisica';
    case Psicologica = 'Psicologica';

    /**
     * Función que regresa un array con los valores del enum convertidos a string
     *
     * @return array<string>
     */
    public static function toList(): array
    {
        $values = [];

        foreach (self::cases() as $case) {
            $values[] = $case->value;
        }

        return $values;
    }
}
