<?php

namespace Database\Seeders;

use App\Models\Catalogos\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            ["nombre" => "ARETE/PERFORACIONES"],
            ["nombre" => "CICATRIZ"],
            ["nombre" => "CIRCUNCISION"],
            ["nombre" => "CORTES DECORATIVOS"],
            ["nombre" => "DEFECTO FISICO"],
            ["nombre" => "LUNARES O MANCHAS"],
            ["nombre" => "MARCAS TEMPORALES"],
            ["nombre" => "OTRO"],
            ["nombre" => "PROTESIS"],
            ["nombre" => "TATUAJE"],
        ];

        sort($tipos);

        foreach ($tipos as $tipo) {
            Tipo::firstOrCreate($tipo);
        }
    }
}
