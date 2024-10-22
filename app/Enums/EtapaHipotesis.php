<?php

namespace App\Enums;

enum EtapaHipotesis: string
{
    case InicialPrimaria = 'Inicial Primaria';
    case InicialSecundaria = 'Inicial Secundaria';
    case FinalPrimaria = 'Final Primaria';
    case FinalSecundaria = 'Final Secundaria';
}
