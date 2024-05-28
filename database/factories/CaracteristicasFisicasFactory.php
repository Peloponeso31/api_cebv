<?php

namespace Database\Factories;

use App\Models\Catalogos\ColorCabello;
use App\Models\Catalogos\ColorOjos;
use App\Models\Catalogos\ColorPiel;
use App\Models\Catalogos\Complexion;
use App\Models\Catalogos\TamanoOjos;
use App\Models\Catalogos\TamanoOrejas;
use App\Models\Catalogos\TipoCabello;
use App\Models\Catalogos\TipoLabios;
use App\Models\Catalogos\TipoNariz;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;


class CaracteristicasFisicasFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'persona_id' => fake()->numberBetween(1, Persona::all()->count()-1),
            'color_cabello_id' => fake()->numberBetween(1, ColorCabello::all()->count()-1),
            'color_ojos_id' => fake()->numberBetween(1, ColorOjos::all()->count()-1),
            'tamano_ojos_id' => fake()->numberBetween(1, TamanoOjos::all()->count()-1),
            'color_piel_id' => fake()->numberBetween(1, ColorPiel::all()->count()-1),
            'tipo_cabello_id' => fake()->numberBetween(1, TipoCabello::all()->count()-1),
            'tipo_labios_id' => fake()->numberBetween(1, TipoLabios::all()->count()-1),
            'tipo_nariz_id' => fake()->numberBetween(1, TipoNariz::all()->count()-1),
            'tamano_orejas_id' => fake()->numberBetween(1, TamanoOrejas::all()->count()-1),
            'complexion_id' => fake()->numberBetween(1, Complexion::all()->count()-1),
        ];
    }
}
