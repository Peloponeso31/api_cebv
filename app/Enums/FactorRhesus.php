<?php

namespace App\Enums;


use App\Contracts\EnumerableInterface;

enum FactorRhesus: string implements EnumerableInterface
{
    case Positivo = 'Positivo';
    case Negativo = 'Negativo';

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
