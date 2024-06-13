<?php

namespace Database\Seeders;

use App\Models\TipoVehiculo;
use Illuminate\Database\Seeder;

class TipoVehiculoSeeder extends Seeder
{
    public function run(): void
    {
        $tipos_vehiculos = [
            'Ambulancia',
            'Auto Tanque',
            'Cabina',
            'Caja',
            'Carroza',
            'Caseta',
            'Celdillas',
            'Chasis',
            'Cheyenne',
            'Combi',
            'Coraza',
            'Deportiva',
            'Dolly',
            'Equipo Especial',
            'Estacas',
            'Estacas 3.5 Tns.',
            'Explorer',
            'F-150',
            'F-350',
            'Foraneo',
            'Grand Cherokee',
            'Grand Voyager',
            'Grua',
            'Habitacion',
            'Hacht Bak',
            'Hidraulica',
            'Indeterminado',
            'Industrial',
            'Jaula',
            'Lobo',
            'Martillo Hidraulico',
            'Microbus',
            'Minibus',
            'Montacargas',
            'No Especificado',
            'Omnibus',
            'Otros',
            'Panel',
            'Pathfinder',
            'Pick-Up',
            'Pipa',
            'Plataforma',
            'Porta Contenedor',
            'Rabon',
            'Ranger Xl',
            'Redilas',
            'Refrigerador',
            'Retro-Escavadora',
            'Revolvedora',
            'Silverado',
            'Sle',
            'Tanque',
            'Tanque (S) O (R)',
            'Tractocamion',
            'Tracto',
            'Tractor',
            'Vagoneta',
            'Vagoneta Quest',
            'Vanette',
            'Vespa',
            'Volteo',
            'Wingstar'
        ];

        foreach ($tipos_vehiculos as $tipo_vehiculo) {
            TipoVehiculo::create([
                'nombre' => $tipo_vehiculo,
            ]);
        }
    }
}
