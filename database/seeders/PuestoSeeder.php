<?php

namespace Database\Seeders;

use App\Models\Catalogos\Puesto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $puestos = [
            "Abogado",
            "Analista de datos",
            "Especialista en búsqueda y rescate",
            "Personal administrativo",
        ];

        foreach ($puestos as $puesto) {
            Puesto::create(["nombre" => $puesto]);
        }
    }
}
