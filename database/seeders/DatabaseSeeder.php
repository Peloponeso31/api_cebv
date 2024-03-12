<?php

namespace Database\Seeders;

use Database\Factories\PersonaFactory;
use Database\Seeders\MunicipioSeeders\MunicipioSeeder;
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
            EstadoSeeder::class,
            HipotesisSeeder::class,
            AsentamientoSeeder::class,
            DireccionSeeder::class,
            DesaparicionSeeder::class,
            PersonaSeeder::class,
            CatalogosSeeder::class,
        ]);

        \App\Models\SenasParticulares::create([
            "region_cuerpo_id" => 3,
            "descripcion" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam harum maiores iste repellendus, sit assumenda odit officia nam eligendi reprehenderit at voluptatem laboriosam, itaque ad omnis quaerat voluptas facilis neque.",
            "foto" => "https://randomurl.com/jaja.si"
        ]);
        

        if (App::environment('local')) {
            \App\Models\User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }
    }
}
