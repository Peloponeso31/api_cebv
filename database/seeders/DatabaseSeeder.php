<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class, // TODO: Remove this line before deploying to production
            UbicacionSeeder::class,
            //AreaSeeder::class,
            //HipotesisSeeder::class,
            //MedioSeeder::class,
            //TipoReporteSeeder::class
            TipoHipotesisSeeder::class
        ]);
    }
}
