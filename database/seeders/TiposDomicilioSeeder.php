<?php

namespace Database\Seeders;

use App\Models\TiposDomicilio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposDomicilioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            "LUGAR DE LOS HECHOS",
            "LUGAR DE LOS HECHOS Y ULTIMA VEZ VISTA",
            "ULTIMA VEZ VISTA",
            "DONDE HABITUALMENTE RESIDE",
        ];

        foreach ($tipos as $tipo) {
            TiposDomicilio::insert([
                'nombre' => $tipo,
            ]);
        }
    }
}
