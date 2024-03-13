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
            AreaSeeder::class,
            TestPermissionSeeder::class, // TODO: Remove this line before deploying to production
            UserSeeder::class, // TODO: Remove this line before deploying to production
            UbicacionSeeder::class,
            MedioSeeder::class,
            TipoReporteSeeder::class,
            TipoHipotesisSeeder::class,
            PruebaSeeder::class ,
        ]);
    }
}
