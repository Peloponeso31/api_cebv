<?php

namespace Database\Factories;

use App\Models\Catalogos\AusenciaDientes;
use App\Models\Catalogos\TratamientoDental;
use App\Models\Catalogos\TipoMenton;
use App\Models\Catalogos\EspecificacionMenton;
use App\Models\Catalogos\RegionDeformacion;
use App\Models\Catalogos\EspecificacionDeformacion;
use App\Models\Catalogos\IntervencionQuirurgica;
use App\Models\Catalogos\EspecificacionIntervencionQuirurgica;
use App\Models\Catalogos\TipoEnfermedadPiel;
use App\Models\Catalogos\EspecificacionEnfermedad;
use App\Models\Catalogos\ObservacionesGenerales;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFiliacionFactory extends Factory
{

    public function definition(): array
    {
        return [
            'persona_id' => fake()->numberBetween(1, Persona::all()->count()-1),
            'ausencia_dientes_id' => fake()->numberBetween(1, ::all()->count()-1),
            'tratamiento_dental_id' => fake()->numberBetween(1, ::all()->count()-1),
            'tipo_menton_id' => fake()->numberBetween(1, ::all()->count()-1),
            'especificacion_menton_id' => fake()->numberBetween(1, ::all()->count()-1),
            'region_deformacion_id' => fake()->numberBetween(1, ::all()->count()-1),
            'especificacion_deformacion_id' => fake()->numberBetween(1, ::all()->count()-1),
            'intervencion_quirurgica_id' => fake()->numberBetween(1, ::all()->count()-1),
            'especificacion_intervencion_quirurgica_id' => fake()->numberBetween(1, ::all()->count()-1),
            'tipo_enfermedad_piel_id' => fake()->numberBetween(1, ::all()->count()-1),
            'especificacion_enfermedad_id' => fake()->numberBetween(1, ::all()->count()-1),
            'observaciones_generales_id' => fake()->numberBetween(1, ::all()->count()-1),
        ];
    }
}
