<?php

namespace Database\Factories\Reportes\Relaciones;

use App\Models\Personas\EstatusPersona;
use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesaparecidoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'persona_id' => Persona::factory(),
            'reporte_id' => Reporte::factory(),
            'clasificacion_persona' => fake()->word(),
            'estatus_preliminar_id' => EstatusPersona::inRandomOrder()->first()->id,
            'estatus_formalizado_id' => EstatusPersona::inRandomOrder()->first()->id,
            'url_boletin' => fake()->imageUrl(1080, 720, 'boletín'),
        ];
    }
}
