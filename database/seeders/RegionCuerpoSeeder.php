<?php

namespace Database\Seeders;

use App\Helpers\ArrayHelpers;
use App\Models\Catalogos\RegionCuerpo;
use Illuminate\Database\Seeder;

class RegionCuerpoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regionesPath = database_path('files/RegionesCuerpoV4.csv');

        $regionesGenerator = static function (array $row): array {
            return [
                'nombre' => $row[1],
                'color' => $row[4],
            ];
        };

        foreach (ArrayHelpers::chunkFile($regionesPath, $regionesGenerator) as $chunk) {
            RegionCuerpo::insert($chunk);
        }
    }
}
