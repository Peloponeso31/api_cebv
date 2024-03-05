<?php

namespace Database\Seeders;

use App\Helpers\ArrayHelpers;
use App\Models\Ubicaciones\Asentamiento;
use App\Models\Ubicaciones\Estado;
use App\Models\Ubicaciones\Municipio;
use Illuminate\Database\Seeder;

class UbicacionSeeder extends Seeder
{
    public function run(): void
    {
        /*
         * Get the path of the CSV files
         */
        $estadosPath = database_path('files/Entidad.csv');
        $municipiosPath = database_path('files/Municipio.csv');
        $asentamientosPath = database_path('files/Localidad.csv');

        /*
         * Get the generator for the models
         */
        $estadoGenerator = static function (array $row): array {
            return [
                'id' => $row[0], // 'id' => '01
                'nombre' => $row[1], // 'nombre' => Veracruz de Ignacio de la Llave
                'abreviatura_inegi' => $row[2], // 'abreviatura_inegi' => Ver.
                'abreviatura_cebv' => $row[3], // 'abreviatura_cebv' => VZ
            ];
        };

        $municipioGenerator = static function (array $row): array {
            return [
                'id' => $row[0], // 'id' => '01001'
                'estado_id' => $row[1], // estado_id => '01'
                'nombre' => $row[3], // nombre => 'Aguascalientes'
            ];
        };

        $asentamientoGenerator = static function (array $row): array {
            return [
                'id' => $row[0], // 'id' => '010010001'
                'municipio_id' => $row[1], // 'municipio_id' => '01001'
                'nombre' => $row[2], // 'nombre' => 'Aguascalientes'
                'ambito' => $row[3], // 'ambito' => 'U'
                'latitud' => $row[4], // 'latitud' => 21.879822
                'longitud' => $row[5], // 'longitud' => -102.296046
                'altitud' => $row[6], // 'altitud' => 1888
            ];
        };

        /*
         * Insert the data into the database
         */
        foreach (ArrayHelpers::chunkFile($estadosPath, $estadoGenerator) as $chunk) {
            Estado::Insert($chunk);
        }

        foreach (ArrayHelpers::chunkFile($municipiosPath, $municipioGenerator) as $chunk) {
            Municipio::Insert($chunk);
        }

        foreach (ArrayHelpers::chunkFile($asentamientosPath, $asentamientoGenerator) as $chunk) {
            Asentamiento::Insert($chunk);
        }
    }
}
