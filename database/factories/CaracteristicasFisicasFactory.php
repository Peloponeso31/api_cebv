<?php

namespace Database\Factories;

use App\Models\Catalogos\Barba;
use App\Models\Catalogos\Bigote;
use App\Models\Catalogos\Calvicie;
use App\Models\Catalogos\EspecificacionBarba;
use App\Models\Catalogos\EspecificacionBigote;
use App\Models\Catalogos\EspecificacionCabello;
use App\Models\Catalogos\EspecificacionNariz;
use App\Models\Catalogos\EspecificacionOjos;
use App\Models\Catalogos\EspecificacionOreja;
use App\Models\Catalogos\Estatura;
use App\Models\Catalogos\FormaCara;
use App\Models\Catalogos\FormaOjos;
use App\Models\Catalogos\FormaOreja;
use App\Models\Catalogos\Peso;
use App\Models\Catalogos\TamanoBoca;
use App\Models\Catalogos\TamanoCabello;
use App\Models\Catalogos\TipoCeja;
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
            
            'barba_id' => fake()->numberBetween(1, Barba::all()->count()-1),
            'bigote_id' => fake()->numberBetween(1, Bigote::all()->count()-1),
            'calvicie_id' => fake()->numberBetween(1, Calvicie::all()->count()-1),
            'especificacion_barba_id' => fake()->numberBetween(1, EspecificacionBarba::all()->count()-1),
            'especificacion_bigote_id' => fake()->numberBetween(1, EspecificacionBigote::all()->count()-1),
            'especificacion_cabello_id' => fake()->numberBetween(1, EspecificacionCabello::all()->count()-1),
            'especificacion_nariz_id' => fake()->numberBetween(1, EspecificacionNariz::all()->count()-1),
            'especificacion_ojos_id' => fake()->numberBetween(1, EspecificacionOjos::all()->count()-1),
            'especificacion_oreja_id' => fake()->numberBetween(1, EspecificacionOreja::all()->count()-1),
            'estatura_id' => fake()->numberBetween(1, Estatura::all()->count()-1),
            'forma_cara_id' => fake()->numberBetween(1, FormaCara::all()->count()-1),
            'forma_ojos_id' => fake()->numberBetween(1, FormaOjos::all()->count()-1),
            'forma_oreja_id' => fake()->numberBetween(1, FormaOreja::all()->count()-1),
            'peso_id' => fake()->numberBetween(1, Peso::all()->count()-1),
            'tamano_boca_id' => fake()->numberBetween(1, TamanoBoca::all()->count()-1),
            'tamano_cabello_id' => fake()->numberBetween(1, TamanoCabello::all()->count()-1),
            'tipo_ceja_id' => fake()->numberBetween(1, TipoCeja::all()->count()-1),
        ];
    }
}
