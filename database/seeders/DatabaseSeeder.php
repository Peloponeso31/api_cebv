<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Persona::factory(100)->create();
        \App\Models\Domicilio::factory(30)->create();
        \App\Models\User::factory(10)->create();

        \App\Models\Reporte::create([
            'reportante_id' => 1,
            'reportada_id' => 2
        ]);

        \App\Models\Reporte::create([
            'reportante_id' => 3,
            'reportada_id' => 4
        ]);

        \App\Models\Reporte::create([
            'reportante_id' => 5,
            'reportada_id' => 6
        ]);
        
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
