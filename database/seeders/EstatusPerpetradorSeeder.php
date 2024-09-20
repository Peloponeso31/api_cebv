<?php

namespace Database\Seeders;

use App\Models\EstatusPerpetrador;
use Illuminate\Database\Seeder;

class EstatusPerpetradorSeeder extends Seeder
{
    public function run(): void
    {
        $estatusPerpetradores = [
            'VIVO',
            'MUERTO',
            'SE DESCONOCE',
            'CAUSO BAJA DE UNA CORPORACION',
            'ESTA EN SERVICIO',
            'ESTA RECLUIDO',
        ];

        foreach ($estatusPerpetradores as $estatusPerpetrador) {
            EstatusPerpetrador::create([
                'nombre' => $estatusPerpetrador,
            ]);
        }
    }
}
