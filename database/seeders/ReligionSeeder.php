<?php

namespace Database\Seeders;

use App\Models\Catalogos\Etnia\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    public function run(): void
    {

        $religiones = [
            "ADVENIDISTA",
            "ATEA",
            "BAUTISMAL",
            "BAUTISTA",
            "BRAHAMANISMO",
            "BUDISTA",
            "CALVINISTA",
            "CATOLICA",
            "CREYENTE",
            "CRISTIANO",
            "EPISCOPAL",
            "EVANGELICA",
            "EVANGELISTA",
            "HINDUISTA",
            "ISLAMICA",
            "JUDIA",
            "KRISHNA",
            "LIBRE PENSAMIENTO",
            "LUTERANA",
            "MAHOMETANA",
            "MENONITA",
            "METODISTA",
            "MORMONA",
            "MUSULMANA",
            "ORTODOXA",
            "OTRA",
            "PRESBITERIANA",
            "PROTESTANTE",
            "PURITANA",
            "SATANICO",
            "SIN RELIGION",
            "TESTIGO DE JEHOVA",
            "TOISTA"
        ];

        foreach ($religiones as $religion) {
            Religion::create([
                'nombre' => $religion,
            ]);
        }
    }
}
