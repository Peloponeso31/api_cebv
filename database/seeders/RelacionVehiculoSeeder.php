<?php

namespace Database\Seeders;

use App\Models\RelacionVehiculo;
use Illuminate\Database\Seeder;

class RelacionVehiculoSeeder extends Seeder
{
    public function run(): void
    {
        $relaciones_vehiuclos = [
            'Conducía el Vehículo',
            'Era Pasajero del Vehículo',
            'Fue Obligado a Abordar el Vehículo',
            'Se Desconoce'
        ];

        foreach ($relaciones_vehiuclos as $relacion_vehiuclo) {
            RelacionVehiculo::create(['nombre' => $relacion_vehiuclo]);
        }
    }
}
