<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helpers\ArrayHelpers;
use App\Models\Ubicaciones\Direccion;
use App\Models\Reportes\Informacion\HechoDesaparicion;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Persona;
use App\Models\Reportes\Reporte;
use Illuminate\Support\Facades\DB;

class PruebaSeeder extends Seeder
{
    public function run(): void
    {
        /*
        * Get the path of the CSV files
        */

        $direccionesPath = database_path('Modelos_Prueba/DireccionesPrueba.csv');
        $hechosPath = database_path('Modelos_Prueba/HechosDesaparicionesPrueba.csv');
        $hipotesisPath = database_path('Modelos_Prueba/HipotesisPrueba.csv');
        $personasPath = database_path('Modelos_Prueba/PersonasPrueba.csv');
        $reportesPath = database_path('Modelos_Prueba/ReportesPrueba.csv');

        /*
         * Get the generator for the models
         */

        $personaGenerator = static function (array $row): array {
            return [
                'nombre' => $row[0],
                'apellido_paterno' => $row[1],
                'apellido_materno' => $row[2],
                'fecha_nacimiento' => $row[3],
                'curp' => $row[4],
                'ocupacion' => $row[5],
                'sexo_al_nacer' => $row[6],
                'genero' => $row[7],
            ];
        };

        $direccionGenerator = static function (array $row): array {
            return [
                'asentamiento_id' => $row[0],
                'calle' => $row[1],
                'numero_exterior' => $row[2],
                'numero_interior' => $row[3],
                'calle_1' => $row[4],
                'calle_2' => $row[5],
                'tramo_carretero' => $row[6],
                'codigo_postal' => $row[7],
                'referencia' => $row[8],
            ];
        };

        $reporteGenerator = static function (array $row): array {
            return [
                'tipo_reporte_id' => $row[0],
                'area_id' => $row[1],
                'medio_id' => $row[2],
                'direccion_id' => $row[3],
                'zona_estado' => $row[4],
                'estatus' => $row[6],
                'fecha_desaparicion' => $row[7],
                'fecha_percato' => $row[8],
                'folio' => $row[9],

            ];
        };

        $hechosGenerator = static function (array $row): array {
            return [
                'reporte_id' => $row[0],
                'descripcion_cambio_comportamiento' => $row[2],
                'descripcion_amenaza' => $row[4],
                'situacion_previa' => $row[6],
                'informacion_relevante' => $row[7],
                'hechos_desaparicion' => $row[8],
                'sintesis_desaparicion' => $row[9],
            ];
        };

        $hipotesisGenerator = static function (array $row): array {
            return [
                'reporte_id' => $row[0],
                'area_id' => $row[1],
                'fecha_localizacion' => $row[2],
                'sintesis_localizacion' => $row[3],
                'circunstancia_uno_id' => $row[4],
                'hipotesis_uno' => $row[5],
                'circunstancia_dos_id' => $row[6],
                'hipotesis_dos' => $row[7],
                'sitio_final' => $row[8],
                'tipo_hipotesis_id' => $row[9],
                'observaciones' => $row[10],
            ];
        };

        /*
        * Insert the data into the database
        */
        /**
         * Insert direcciones data
         */
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('ALTER TABLE direcciones DISABLE KEYS');

        foreach (ArrayHelpers::chunkFile($direccionesPath, $direccionGenerator) as $chunk) {
            Direccion::Insert($chunk);
        }

        DB::statement('ALTER TABLE direcciones ENABLE KEYS');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        /*
         * Insert personas data
         */
        foreach (ArrayHelpers::chunkFile($personasPath, $personaGenerator) as $chunk) {
            Persona::Insert($chunk);
        }

        /*
         * Insert reportes data
         */
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('ALTER TABLE reportes DISABLE KEYS');

        foreach (ArrayHelpers::chunkFile($reportesPath, $reporteGenerator) as $chunk) {
            Reporte::Insert($chunk);
        }

        DB::statement('ALTER TABLE reportes ENABLE KEYS');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        /*
         * Insert hechos data
         */
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('ALTER TABLE hechos_desapariciones DISABLE KEYS');

        foreach (ArrayHelpers::chunkFile($hechosPath, $hechosGenerator) as $chunk) {
            HechoDesaparicion::Insert($chunk);
        }

        DB::statement('ALTER TABLE hechos_desapariciones ENABLE KEYS');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        /*
         * Insert hipotesis data
         */
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('ALTER TABLE hipotesis DISABLE KEYS');

        foreach (ArrayHelpers::chunkFile($hipotesisPath, $hipotesisGenerator) as $chunk) {
            Hipotesis::Insert($chunk);
        }

        DB::statement('ALTER TABLE hipotesis ENABLE KEYS');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
