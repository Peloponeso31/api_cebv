<?php

namespace Database\Seeders;

use App\Helpers\ArrayHelpers;
use App\Models\Reportes\Hipotesis\Circunstancia;
use App\Models\Reportes\Hipotesis\TipoHipotesis;
use Illuminate\Database\Seeder;

class TipoHipotesisSeeder extends Seeder
{
    public function run(): void
    {
        /**
         * Seed the circunstancias table
         */
        $circunstancias = [
            'La persona no fue víctima de ningún delito',
            'La persona fue víctima de un delito referente a la privación de la libertad',
            'La persona fue víctima de un delito diverso',
            'Se desconoce la circunstancia específica',
        ];

        foreach ($circunstancias as $circunstancia) {
            Circunstancia::firstOrCreate([
                'descripcion' => $circunstancia
            ]);
        }

        /*
         * Get the path to the CSV file
         */
        $hipotesisPath = database_path('files/Hipotesis.csv');

        /*
         * Get the generator for the model
         */
        $hipotesisGenerator = static function (array $row): array {
            return [
                'circunstancia_id' => $row[0], // 'circunstancia' => '1'
                'abreviatura' => $row[1], // 'abreviatura' => 'ACC'
                'descripcion' => $row[2], // 'descripcion' => 'Accidente'
            ];
        };

        /*
         * Insert the data into the database
         */
        foreach (ArrayHelpers::chunkFile($hipotesisPath, $hipotesisGenerator) as $chunk) {
            TipoHipotesis::Insert($chunk);
        }
    }
}
