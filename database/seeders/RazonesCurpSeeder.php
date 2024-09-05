<?php

namespace Database\Seeders;

use App\Models\RazonesCurp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RazonesCurpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $razones = [
            "EL REPORTANTE NO PROPORCIONO LA INFORMACION NECESARIA",
            "LA CURP PRESENTA IRREGULARIDADES ANTE EL REGISTRO NACIONAL DE POBLACIÓN",
            "LA DESAPARICIÓN SUCEDIO ANTES DE 1996",
            "LA PERSONA NO SE ENCUETRA REGISTRADA POR MOTIVOS DE MARGINACIÓN",
            "LA VICTIMA ES EXTRANJERO/A",
            "MENOR DE EDAD NO REGISTRADO",
            "NO CUENTA CON LA INFORMACION EN EL EXPEDIENTE O CARPETA CORRESPONDIENTE"
        ];

        foreach ($razones as $razon) {
            RazonesCurp::firstOrCreate([
                "nombre" => $razon
            ]);
        }

    }
}
