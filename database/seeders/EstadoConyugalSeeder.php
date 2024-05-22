<?php

namespace Database\Seeders;

use App\Models\EstadoConyugal;
use Illuminate\Database\Seeder;

class EstadoConyugalSeeder extends Seeder
{
    public function run(): void
    {
        $estadosConyugales = [
            'Soltero',
            'Soltera',
            'Soltero(a)',
            'Casado',
            'Casada',
            'Casado(a)',
            'Viudo',
            'Viuda',
            'Viudo(a)',
            'Concubino',
            'Concubina',
            'Concubino(a)',
            'Unión Libre',
            'Divorciado',
            'Divorciada',
            'Divorciado(a)',
            'Comprometido',
            'Comprometida',
            'Comprometido(a)',
            'Polígamo',
            'Polígama',
            'Polígamo(a)',
            'Separado',
            'Separada',
            'Separado(a)',
            'Sociedad en Convivencia',
            'No Especifica'
        ];

        foreach ($estadosConyugales as $estadoConyugal) {
            EstadoConyugal::create([
                'nombre' => $estadoConyugal
            ]);
        }
    }
}
