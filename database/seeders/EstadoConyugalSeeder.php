<?php

namespace Database\Seeders;

use App\Models\EstadoConyugal;
use Illuminate\Database\Seeder;

class EstadoConyugalSeeder extends Seeder
{
    public function run(): void
    {
        $estadosConyugales = [
            'SOLTERO(A)',
            'CASADO(A)',
            'VIUDO(A)',
            'CONCUBINATO',
            'UNION LIBRE',
            'DIVORCIADO',
            'COMPROMETIDO(A)',
            'POLIGAMO(A)',
            'SEPARADO(A)',
            'SOCIEDAD EN CONVIVENCIA',
            'NO ESPECIFICA'
        ];

        foreach ($estadosConyugales as $estadoConyugal) {
            EstadoConyugal::create([
                'nombre' => $estadoConyugal
            ]);
        }
    }
}
