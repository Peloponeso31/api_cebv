<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TestPermissionSeeder::class, // TODO: Remove this line before deploying to production
            UserSeeder::class, // TODO: Remove this line before deploying to production
            //PruebaSeeder::class ,
            UbicacionSeeder::class,
            AreaSeeder::class,
            MedioSeeder::class,
            TipoReporteSeeder::class,
            TipoHipotesisSeeder::class,
            CatalogosSeeder::class,
        ]);

        \App\Models\CaracteristicasFisicas::create([
            "persona_id" => 1,
            "color_cabello_id" => 1,
            "color_ojos_id"=>2,
            "tamano_ojos_id"=> 3,
            "color_piel_id"=>3,
            "tipo_cabello_id"=>2,
            "tipo_labios_id"=>1,
            "tipo_nariz_id"=>4,
            "tamano_orejas_id"=>2,
            "complexion_id"=>4
        ]);

        \App\Models\Etnia::create([
            "persona_id" => 1,
            "religion_id" => 4,
            "lengua_id"=> 5,
            "grupo_etnico_id"=>2,
            "vestimenta_id" => 1,
            "ascendencia_id"=> 2,
        ]);
    }
}
