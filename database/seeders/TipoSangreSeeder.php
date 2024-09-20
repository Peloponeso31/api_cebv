<?php

namespace Database\Seeders;

use App\Models\TipoSangre;
use Illuminate\Database\Seeder;

class TipoSangreSeeder extends Seeder
{
    public function run(): void
    {
        $tiposSangre = [
            'A',
            'B',
            'AB',
            'O',
            'NO ESPECIFICA'
        ];

        foreach ($tiposSangre as $tipoSangre) {
            TipoSangre::create([
                'nombre' => $tipoSangre,
            ]);
        }
    }
}
