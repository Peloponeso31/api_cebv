<?php

namespace Database\Seeders;

use App\Models\CondicionVulnerabilidad\Sangre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SangreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sangre = [
            'A+', 
            'A-', 
            'B+', 
            'B-', 
            'AB+', 
            'AB-', 
            'O+',
            'O-'
        ];

        foreach ($sangre as $sangre) {
            Sangre::create([
                'tipo' => $sangre,
            ]);
        }
    }
}
