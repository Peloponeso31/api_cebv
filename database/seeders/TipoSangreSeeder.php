<?php

namespace Database\Seeders;

use App\Models\TipoSangre;
use Illuminate\Database\Seeder;

class TipoSangreSeeder extends Seeder
{
    public function run(): void
    {
        $tiposSangre = [
            'A+',
            'A-',
            'B+',
            'B-',
            'AB+',
            'AB-',
            'O+',
            'O-',
            'No especifica'
        ];

        foreach ($tiposSangre as $tipoSangre) {
            TipoSangre::create([
                'nombre' => $tipoSangre,
            ]);
        }
    }
}
