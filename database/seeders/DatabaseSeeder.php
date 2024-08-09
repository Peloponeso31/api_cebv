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
         * Catalogs seeders
         */
        $this->call([
            AreaSeeder::class,
            EstatusPersonaSeeder::class,
            InstitucionSeeder::class,
            MedioSeeder::class,
            ParentescoSeeder::class,
            SitioSeeder::class,
            TipoHipotesisSeeder::class,
            TipoReporteSeeder::class,
            UbicacionSeeder::class,
            AreaAtiendeMunicipioSeeder::class,
            ZonaEstadoSeeder::class,
            SexoSeeder::class,
            GeneroSeeder::class,
            CompaniaTelefonicaSeeder::class,
            ContextoSocialSeeder::class,
            ContextoEconomicoSeeder::class,
            ContextoFamiliarSeeder::class,
            NacionalidadSeeder::class,
            EscolaridadSeeder::class,
            EstadoConyugalSeeder::class,
            ReligionSeeder::class,
            LenguaSeeder::class,
            TipoRedSocialSeeder::class,
            TipoOcupacionSeeder::class,
            OcupacionSeeder::class,
            GrupoVulnerableSeeder::class,
            TipoHipotesisInmediataSeeder::class,
            GrupoPertenenciaSeeder::class,
            PertenenciaSeeder::class,
            ColectivoSeeder::class,
            ColorSeeder::class,
            RazonesCurpSeeder::class,
            TiposDomicilioSeeder::class,
            PuestoSeeder::class,
            RegionCuerpoSeeder::class,
            LadoSeeder::class,
            OficinaSeeder::class,
            TipoSeeder::class,
            VistaSeeder::class
        ]);

        /**
         * Caracteristicas Físicas seeders
         */
        $this->call([
            ComplexionSeeder::class,
            ColorPielSeeder::class,
            FormaCaraSeeder::class,

            ColorOjoSeeder::class,
            FormaOjoSeeder::class,
            TamanoOjoSeeder::class,

            CalvicieSeeder::class,
            ColorCabelloSeeder::class,
            TamanoCabelloSeeder::class,
            TipoCabelloSeeder::class,
            CejaSeeder::class,

            FormaNarizSeeder::class,
            TamanoBocaSeeder::class,
            TamanoLabiosSeeder::class,

            TamanoOrejaSeeder::class,
            FormaOrejaSeeder::class,
            TipoMentonSeeder::class,

            RegionDeformacionSeeder::class,
            IntervencionQuirurgicaSeeder::class,
            EnfermedadPielSeeder::class,
            TipoSangreSeeder::class,
        ]);

        /**
         * Situaciones de salud
         */
        $this->call([
            CondicionSaludSeeder::class,
        ]);

        /**
         * Vehículos seeders
         */
        $this->call([
            MarcaVehiculoSeeder::class,
            TipoVehiculoSeeder::class,
            UsoVehiculoSeeder::class,
            RelacionVehiculoSeeder::class,
        ]);

        /**
         * Test seeders
         */
        $this->call([
            PersonaSeeder::class,
            ReporteSeeder::class,
            TelefonoSeeder::class,
            ContactoSeeder::class,
        ]);

        /**
         * Seeders que no sé dónde meter
         */
        $this->call([
            EnfoqueDiferenciadoSeeder::class,
            SituacionMigratoriaSeeder::class,
            ParticularSeeder::class,
            AutoridadSeeder::class,
            MetodoCapturaSeeder::class,
            MedioCapturaSeeder::class,
            EstatusPerpetradorSeeder::class,
        ]);

        /**
         * System seeders
         */
        $this->call([
            TestPermissionSeeder::class, // TODO: Remove this line before deploying to production
            UserSeeder::class, // TODO: Remove this line before deploying to production
        ]);
    }
}
