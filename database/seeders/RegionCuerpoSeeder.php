<?php

namespace Database\Seeders;

use App\Helpers\ArrayHelpers;
use App\Models\Catalogos\RegionCuerpo;
use App\Models\Catalogos\RegionCuerpoRnpdno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionCuerpoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regionesPath = database_path('files/RegionesCuerpo.csv');

        $regionesGenerator = static function (array $row): array {
            return [
                'nombre' => $row[0],
                'color' => $row[1],
            ];
        };

        foreach (ArrayHelpers::chunkFile($regionesPath, $regionesGenerator) as $chunk) {
            RegionCuerpo::insert($chunk);
        }
    }
}
