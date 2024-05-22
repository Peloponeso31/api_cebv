<?php

namespace Database\Seeders;

use App\Models\MarcaVehiculo;
use Illuminate\Database\Seeder;

class MarcaVehiculoSeeder extends Seeder
{
    public function run(): void
    {
        $marcas = [];

        foreach ($marcas as $marca) {
            MarcaVehiculo::create($marca);
        }
    }
}
