<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    public function run(): void
    {
        $clubes = [
            'Club de lectura',
            'Club de ajedrez',
            'Club de música',
            'Club de danza',
            'Club de teatro',
            'Club de cine',
            'Club de fotografía',
            'Club de pintura',
            'Club de dibujo',
            'Club de manualidades',
            'Club de cocina',
            'Club de jardinería',
        ];

        foreach ($clubes as $club) {
            Club::create(['nombre' => $club]);
        }
    }
}
