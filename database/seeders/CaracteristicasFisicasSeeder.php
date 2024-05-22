<?php

namespace Database\Seeders;

use App\Models\CaracteristicasFisicas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reportes\Relaciones\Desaparecido;

class CaracteristicasFisicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desaparecidos = Desaparecido::all();
        foreach ($desaparecidos as $desaparecido) {
            CaracteristicasFisicas::factory()->create([
                "persona_id" => $desaparecido->persona->id
            ]);
        }
    }
}
