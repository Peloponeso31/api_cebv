<?php

namespace Database\Seeders;

use App\Models\TipoCondicionSalud;
use Illuminate\Database\Seeder;

class TipoCondicionSaludSeeder extends Seeder
{
    public function run(): void
    {

        $tiposCondicionesSalud = [
            "ANTECEDENTE DE CONSUMO PROBLEMÁTICO DE ALCOHOL",
            "ANTECEDENTE DE CONSUMO PROBLEMÁTICO DE SUSTANCIAS",
            "ANTECEDENTE DE CONSUMO PROBLEMÁTICO DE TABACO",
            "ANTECEDENTE DE CONSUMO DE MARIHUANA",
            "CONSUMO DE ALCOHOL",
            "CONSUMO DE CRISTAL",
            "CONSUMO DE SUSTANCIAS SIN ESPECIFICAR",
            "CONSUMO DE MARIHUANA",
            "CONSUMO DE TABACO",
            "CONSUMO PROBLEMÁTICO DE ALCOHOL",
            "CONSUMO PROBLEMÁTICO DE CRISTAL",
            "CONSUMO PROBLEMÁTICO DE TABACO",
            "PRESENTA ESTRABISMO",
            "PRESENTA CONVULSIONES",
            "PRESENTA EPILEPSIA",
            "PRESENTA CRISIS NERVIOSAS",
            "PRESENTA ANSIEDAD",
            "PRESENTA DIABETES",
            "PRESENTA HIPERTENSIÓN",
            "PRESENTA ESQUIZOFRENIA",
            "PRESENTA DEPRESIÓN",
            "PRESENTA HIPERACTIVIDAD",
            "PRESENTA PÉRDIDA DE MEMORIA",
            "PRESENTA AUTISMO",
            "PRESENTA ALZHEIMER",
            "PRESENTA DEMENCIA SENIL",
            "REQUIERE ATENCIÓN ESPECIALIZADA",
            "UTILIZA LENTES",
            "PRESENTA DISCAPACIDAD AUDITIVA",
            "PRESENTA DISCAPACIDAD FÍSICA",
            "PRESENTA DISCAPACIDAD VISUAL",
            "PRESENTA DISCAPACIDAD MENTAL",
            "PRESENTA TDAH",
            "PRESENTA ASMA",
            "PADECE DE SUS FACULTADES MENTALES",
            "PRESENTA SÍNDROME DE DOWN",
            "PRESENTA TRASTORNO BIPOLAR",
            "PRESENTA TRASTORNO LÍMITE DE LA PERSONALIDAD",
            "PRESENTA CÁNCER",
            "PRESENTA INSUFICIENCIA RENAL"
        ];

        foreach ($tiposCondicionesSalud as $condicionSalud) {
            TipoCondicionSalud::create([
                'nombre' => $condicionSalud,
            ]);
        }
    }
}
