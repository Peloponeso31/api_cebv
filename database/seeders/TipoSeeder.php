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
            'ARETE / PERFORACIONES',
            'CICATRIZ',
            'CIRCUNCISIÓN',
            'CORTES DECORATIVOS',
            'DEFECTO FÍSICO / DEFORMATION',
            'LUNARES O MANCHAS',
            'MARCAS TEMPORALES',
            'OTRO',
            'PRÓTESIS',
            'TATUAJE',
        ];

        sort($tipos);

        foreach ($tipos as $tipo) {
            Tipo::firstOrCreate(['nombre' => $tipo]);
        }
    }
}
