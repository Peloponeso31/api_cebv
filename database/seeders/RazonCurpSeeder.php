<?php

namespace Database\Seeders;

use App\Models\RazonCurp;
use Illuminate\Database\Seeder;

class RazonCurpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $razones = [
            "EL REPORTANTE NO PROPORCIONO LA INFORMACION NECESARIA",
            "LA CURP PRESENTA IRREGULARIDADES ANTE EL REGISTRO NACIONAL DE POBLACIÓN",
            "LA DESAPARICION SUCEDIO ANTES DE 1996",
            "LA PERSONA NO SE ENCUETRA REGISTRADA POR MOTIVOS DE MARGINACIÓN",
            "LA VICTIMA ES EXTRANJERO/A",
            "MENOR DE EDAD NO REGISTRADO",
            "NO CUENTA CON LA INFORMACION EN EL EXPEDIENTE O CARPETA CORRESPONDIENTE"
        ];

        foreach ($razones as $razon) {
            RazonCurp::insert([
                "nombre" => $razon
            ]);
        }

    }
}
