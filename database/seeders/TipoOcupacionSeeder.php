<?php

namespace Database\Seeders;

use App\Models\TipoOcupacion;
use Illuminate\Database\Seeder;

class TipoOcupacionSeeder extends Seeder
{
    public function run(): void
    {
        $ocupacionesGenericas = [
            'Doctor',
            'Contador',
            'Vendedor',
            'Abogado',
            'Ingeniero',
            'Maestro',
            'Arquitecto',
            'Administrador',
        ];

        foreach ($ocupacionesGenericas as $ocupacion) {
            TipoOcupacion::create([
                'nombre' => $ocupacion,
            ]);
        }
    }
}
