<?php

namespace Database\Seeders;

use App\Models\FormaOreja;
use Illuminate\Database\Seeder;

class FormaOrejaSeeder extends Seeder
{
    public function run(): void
    {
        $formasOrejas = [
            'Almendra',
            'Coliflor',
            'Lóbulo partido',
            'Ovalada',
            'Puntiaguda',
            'Redonda',
            'Triangular',
        ];

        foreach ($formasOrejas as $formaOreja) {
            FormaOreja::create([
                'nombre' => $formaOreja,
            ]);
        }
    }
}
