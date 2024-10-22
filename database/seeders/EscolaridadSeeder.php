<?php

namespace Database\Seeders;

use App\Models\Escolaridad;
use Illuminate\Database\Seeder;

class EscolaridadSeeder extends Seeder
{
    public function run(): void
    {
        $escolaridades = [
            'Ninguna',
            'Primaria',
            'Secundaria',
            'Preparatoria',
            'C.C.H',
            'Vocacional',
            'Bachillerato',
            'Técnico',
            'Comercial',
            'Profesional Técnico',
            'Normal',
            'Licenciatura',
            'Especialidad',
            'Maestría',
            'Doctorado',
            'Diplomado',
            'Preescolar',
            'Maternal',
            'No Especifica'
        ];

        foreach ($escolaridades as $escolaridad) {
            Escolaridad::create([
                'nombre' => $escolaridad,
            ]);
        }
    }
}
