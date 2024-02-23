<?php

namespace Database\Seeders;

use App\Models\Ubicaciones\Estado;
use Database\Seeders\MunicipioSeeders\AguascalientesSeeder;
use Database\Seeders\MunicipioSeeders\MunicipioSeeder;
use Database\Seeders\MunicipioSeeders\VeracruzSeeder;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    public function run(): void
    {
        $estados = [
            'Aguascalientes',
            'Baja California',
            'Baja California Sur',
            'Campeche',
            'Chiapas',
            'Chihuahua',
            'Coahuila de Zaragoza',
            'Colima',
            'Ciudad de México',
            'Durango',
            'Guanajuato',
            'Guerrero',
            'Hidalgo',
            'Jalisco',
            'México',
            'Michoacán de Ocampo',
            'Morelos',
            'Nayarit',
            'Nuevo León',
            'Oaxaca',
            'Puebla',
            'Querétaro',
            'Quintana Roo',
            'San Luis Potosí',
            'Sinaloa',
            'Sonora',
            'Tabasco',
            'Tamaulipas',
            'Tlaxcala',
            'Veracruz de Ignacio de la Llave',
            'Yucatán',
            'Zacatecas',
        ];

        foreach ($estados as $estado) {
            Estado::firstOrCreate(['nombre' => $estado]);
        }

        $this->call([
            AguascalientesSeeder::class,
            VeracruzSeeder::class
        ]);
    }
}
