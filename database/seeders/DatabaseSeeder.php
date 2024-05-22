<?php

namespace Database\Seeders;

use App\Models\CaracteristicasFisicas;
use App\Models\ContextoSocial;
use App\Models\MarcaVehiculo;
use App\Models\Nacionalidad;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * System seeders
         */
        $this->call([
            TestPermissionSeeder::class, // TODO: Remove this line before deploying to production
            UserSeeder::class, // TODO: Remove this line before deploying to production
        ]);

        /**
         * Catalogs seeders
         */
        $this->call([
            AreaSeeder::class,
            EstatusPersonaSeeder::class,
            InstitucionSeeder::class,
            MedioSeeder::class,
            ParentescoSeeder::class,
            CatalogosSeeder::class,
            SitioSeeder::class,
            TipoHipotesisSeeder::class,
            TipoReporteSeeder::class,
            UbicacionSeeder::class,
            ZonaEstadoSeeder::class,
            SexoSeeder::class,
            GeneroSeeder::class,
            CompaniaTelefonicaSeeder::class,
            ContextoSocialSeeder::class,
            ContextoEconomicoSeeder::class,
            ContextoFamiliarSeeder::class,
            nacionalidadSeeder::class,
            EscolaridadSeeder::class,
            EstadoConyugalSeeder::class,
            MarcaVehiculoSeeder::class,
        ]);

        /**
         * Test seeders
         */
        $this->call([
            PersonaSeeder::class,
            ReporteSeeder::class,
            TelefonoSeeder::class,
            ContactoSeeder::class
        ]);
    }
}
