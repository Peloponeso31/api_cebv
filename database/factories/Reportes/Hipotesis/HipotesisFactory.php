<?php

namespace Database\Factories\Reportes\Hipotesis;

use App\Models\Informaciones\Sitio;
use App\Models\Oficialidades\Area;
use App\Models\Reportes\Hipotesis\TipoHipotesis;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Factories\Factory;

class HipotesisFactory extends Factory
{
    public function definition(): array
    {
        return [
            'reporte_id' => Reporte::factory(),
            'tipo_hipotesis_id' => TipoHipotesis::inRandomOrder()->first()->id,
            'sitio_id' => Sitio::inRandomOrder()->first()->id,
            'area_asigna_sitio_id' => Area::inRandomOrder()->first()->id,
            'etapa' => fake()->randomElement(['Inicial', 'Final']),
            'descripcion' => fake()->text(200),
        ];
    }
}
