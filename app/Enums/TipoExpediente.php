<?php

namespace App\Enums;


use App\Contracts\EnumerableInterface;

enum TipoExpediente: string implements EnumerableInterface
{
    case Directo = 'Directo';
    case Indirecto = 'Indirecto';

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
