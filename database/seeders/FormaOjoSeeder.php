<?php

namespace Database\Seeders;

use App\Models\FormaOjo;
use Illuminate\Database\Seeder;

class FormaOjoSeeder extends Seeder
{
    public function run(): void
    {
        $formasOjos = [
            'Alargados',
            'Ovalados',
            'Redondos',
            'Rasgados',
            'No especifica',
        ];

        sort($formasOjos);

        foreach ($formasOjos as $formaOjo) {
            FormaOjo::create([
                'nombre' => $formaOjo,
            ]);
        }
    }
}
