<?php

namespace Database\Seeders;

use App\Models\Catalogos\Oficina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oficinas = [
            ["nombre" => "Celula Norte"],
            ["nombre" => "Celula Centro"],
            ["nombre" => "Celula Sur"],
            ["nombre" => "Búsqueda Inmediata"],
            ["nombre" => "Larga Data"],
            ["nombre" => "OGPI"],
        ];

        foreach ($oficinas as $oficina) {
            Oficina::firstOrCreate($oficina);
        }
    }
}
