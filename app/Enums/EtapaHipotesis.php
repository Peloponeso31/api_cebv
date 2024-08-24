<?php

namespace App\Enums;

use App\Contracts\EnumerableInterface;

enum EtapaHipotesis: string implements EnumerableInterface
{
    case Inicial = 'Inicial';

    case Final = 'Final';

    public static function toList(): array
    {
        $values = [];

        foreach (self::cases() as $case) {
            $values[] = $case->value;
        }

        return $values;
    }
}
