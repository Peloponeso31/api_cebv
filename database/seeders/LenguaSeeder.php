<?php

namespace Database\Seeders;

use App\Models\Catalogos\Etnia\Lengua;
use Illuminate\Database\Seeder;

class LenguaSeeder extends Seeder
{
    public function run(): void
    {
        $lenguas = [
            "Nahualt",
            "Paipai",
            "Kiliwa",
            "Cucapa",
            "Cochini",
            "Kumiai",
            "Seri",
            "Chontal de Oaxaca",
            "Chinanteco",
            "Chinanteco Ojitlan",
            "Chinanteco de Usila",
            "Chinanteco de Quiotepec",
            "Chinanteco de Yolox",
            "Chinanteco de Palantla",
            "Chinanteco de Valle Nacional",
            "Chinanteco de Lalana",
            "Chinanteco de Latani",
            "Chinanteco de Petlapa",
            "Pame",
            "Chichimeca Jonaz",
            "Otomi",
            "Mazahua",
            "Matlatzinca",
            "Español",
        ];

        sort($lenguas);

        foreach ($lenguas as $lengua) {
            Lengua::create([
                'nombre' => $lengua
            ]);
        }
    }
}
