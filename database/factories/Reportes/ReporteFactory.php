<?php

namespace Database\Factories\Reportes;

use App\Models\Informaciones\Medio;
use App\Models\Oficialidades\Area;
use App\Models\Reportes\Hipotesis\TipoHipotesis;
use App\Models\Reportes\Reporte;
use App\Models\Reportes\TipoReporte;
use App\Models\Ubicaciones\Estado;
use App\Models\Ubicaciones\ZonaEstado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ReporteFactory extends Factory
{
    protected $model = Reporte::class;

    public function definition(): array
    {
        return [
            'tipo_reporte_id' => TipoReporte::inRandomOrder()->first()->id,
            'area_atiende_id' => Area::inRandomOrder()->first()->id,
            'medio_conocimiento_id' => Medio::inRandomOrder()->first()->id,
            'estado_id' => Estado::inRandomOrder()->first()->id,
            'zona_estado_id' => ZonaEstado::inRandomOrder()->first()->id,
            'hipotesis_oficial_id' => TipoHipotesis::inRandomOrder()->first()->id,
            'tipo_desaparicion' => fake()->randomElement(['U', 'M']),
            'fecha_creacion' => Carbon::now(),
            'fecha_actualizacion' => Carbon::now(),
        ];
    }
}
