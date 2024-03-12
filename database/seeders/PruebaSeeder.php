<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helpers\ArrayHelpers;
use App\Models\Ubicaciones\Direccion;
use App\Models\Reportes\Informacion\HechoDesaparicion;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Persona;
use App\Models\Reportes\Reporte;
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

        $direccionGenerator = static function (array $row): array {
            return [
                'id' => $row[0],
                'asentamiento_id' => $row[1],
                'calle' => $row[2],
                'numero_exterior' => $row[3],
                'numero_interior' => $row[4],
                'calle1' => $row[5],
                'calle2' => $row[6],
                'tramo_carretero' => $row[7],
                'codigo_postal' => $row[8],
                'referencia' => $row[9],
            ];
        };

        $hechosGenerator = static function (array $row): array {
            return [
                'id' => $row[0],
                'reporte_id' => $row[1],
                'cambio_comportamiento' => $row[2],
                'descripcion_cambio_comportamiento' => $row[3],
                'fue_amenazado' => $row[4],
                'descripcion_amenaza' => $row[5],
                'contador_desapariciones' => $row[6],
                'situacion_previa' => $row[7],
                'informacion_relevante' => $row[8],
                'hechos_desaparicion' => $row[9],
                'sintesis_desaparicion' => $row[10],
            ];
        };

        $hipotesisGenerator = static function (array $row): array {
            return [
                'id' => $row[0],
                'reporte_id' => $row[1],
                'area_id' => $row[2],
                'fecha_localizacion' => $row[3],
                'sintesis_localizacion' => $row[4],
                'circunstancia_uno_id' => $row[5],
                'hipotesis_uno' => $row[6],
                'circunstancia_dos_id' => $row[7],
                'hipotesis_dos' => $row[8],
                'sitio_final' => $row[9],
                'tipo_hipotesis_id' => $row[10],
                'observaciones' => $row[11],
            ];
        };

        $personaGenerator = static function (array $row): array {
            return [
                'id' => $row[0],
                'nombre' => $row[1],
                'apellido_paterno' => $row[2],
                'apellido_materno' => $row[3],
                'fecha_nacimiento' => $row[4],
                'curp' => $row[5],
                'ocupacion' => $row[6],
                'sexo_al_nacer' => $row[7],
                'genero' => $row[8],
            ];
        };

        $reporteGenerator = static function (array $row): array {
            return [
                'id' => $row[0],
               'tipo_reporte_id' => $row[1],
                'area_id' => $row[2],
                'medio_id' => $row[3],
                'direccion_id' => $row[4],
                'zona_estado' => $row[5],
                'tipo_desaparicion' => $row[6],
                'estatus' => $row[7],
                'fecha_desaparicion' => $row[8],
                'fecha_percato' => $row[9],
                'folio' => $row[10],

            ];
        };
        /*
        * Insert the data into the database
        */

        foreach (ArrayHelpers::chunkFile($direccionesPath, $direccionGenerator) as $chunk) {
            Direccion::Insert($chunk);
        }

        foreach (ArrayHelpers::chunkFile($hechosPath, $hechosGenerator) as $chunk) {
            HechoDesaparicion::Insert($chunk);
        }

        foreach (ArrayHelpers::chunkFile($hipotesisPath, $hipotesisGenerator) as $chunk) {
            Hipotesis::Insert($chunk);
        }

        foreach (ArrayHelpers::chunkFile($personasPath, $personaGenerator) as $chunk) {
            Persona::Insert($chunk);
        }

        foreach (ArrayHelpers::chunkFile($reportesPath, $reporteGenerator) as $chunk) {
            Reporte::Insert($chunk);
        }


    }
}
