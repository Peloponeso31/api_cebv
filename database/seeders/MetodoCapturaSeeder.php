<?php

namespace Database\Seeders;

use App\Models\MetodoCaptura;
use Illuminate\Database\Seeder;

class MetodoCapturaSeeder extends Seeder
{
    public function run(): void
    {
        $metodosCaptura = [
            'DESAPARICIÓN',
            'EXTORSIÓN O ENGAÑO',
            'PRIVACIÓN POR PARTICULAR (LEVANTON)',
            'RETEN U OPERATIVO',
            'ORDEN DE APREHENSIÓN',
            'SECUESTRO',
            'OTRO',
            'SIN INFORMACIÓN',
        ];

        foreach ($metodosCaptura as $metodoCaptura) {
            MetodoCaptura::create([
                'nombre' => $metodoCaptura,
            ]);
        }
    }
}
