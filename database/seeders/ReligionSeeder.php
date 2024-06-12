<?php

namespace Database\Seeders;

use App\Models\Catalogos\Etnia\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    public function run(): void
    {

        $religiones = [
            'Católicos',
            'Católicos Ortodoxos',
            'Anabautista/Menonita',
            'Anglicano/Episcopal',
            'Bautista',
            'Luterana',
            'Metodista',
            'Testigos de Jehová',
            'Cristianos',
            'Evangelicos',
            'Pentecostales',
            'Protestantes',
            'Judaísmo',
            'Islamismo',
            'Budismo',
            'Hinduismo',
            'Otras de origen oriental',
        ];

foreach ($religiones as $religion) {
            Religion::create([
                'nombre' => $religion,
            ]);
        }
    }
}
