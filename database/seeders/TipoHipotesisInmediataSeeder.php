<?php

namespace Database\Seeders;

use App\Models\TipoHipotesisInmediata;
use Illuminate\Database\Seeder;

class TipoHipotesisInmediataSeeder extends Seeder
{
    public function run(): void
    {
        $hipotesis = [
            ["ACCIDENTE", "ACC"],
            ["AUSENCIA VOLUNTARIA", "AV"],
            ["AUSENCIA VOLUNTARIA POR VIOLENCIA DE GÉNERO", "AVVG"],
            ["AUSENCIA VOLUNTARIA POR VIOLENCIA INTRAFAMILIAR", "AVVI"],
            ["BAJO RESGUARDO DE AUTORIDAD", "BRA"],
            ["BAJO RESGUARDO FAMILIAR", "BRF"],
            ["CONDICIÓN DE SALUD MENTAL", "CSM"],
            ["CONSUMO DE SUSTANCIAS", "CSU"],
            ["DETENCIÓN", "DET"],
            ["FALTA DE MEDIO DE COMUNICACIÓN", "FMC"],
            ["HOSPITALIZACIÓN", "HOSP"],
            ["DESAPARICIÓN FORZADA", "DF"],
            ["DESAPARICIÓN COMETIDA POR PARTICULARES", "DP"],
            ["ABUSO SEXUAL", "ASX"],
            ["ASALTO", "ASA"],
            ["PRIVACIÓN ILEGAL DE LA LIBERTAD", "PRIV"],
            ["SECUESTRO", "SEC"],
            ["TRATA DE PERSONAS", "TRAT"],
            ["SUSTRACCIÓN DE MENORES", "SUS"],
            ["ACCIDENTE", "ACCSV"],
            ["CAUSAS NATURALES", "CN"],
            ["FEMINICIDIO", "FEM"],
            ["HOMICIDIO DOLOSO", "HD"],
            ["HOMICIDIO IMPRUDENCIAL", "HI"],
            ["NO VALORABLE", "NV"],
            ["SUICIDIO", "SUI"],
            ["AUSENCIA VOLUNTARIA", "AV"],
            ["AUSENCIA VOLUNTARIA POR VIOLENCIA DE GÉNERO", "AVVG"],
            ["AUSENCIA VOLUNTARIA POR VIOLENCIA INTRAFAMILIAR", "AVVI"],
            ["CONDICIÓN DE SALUD MENTAL", "CSM"],
            ["DESAPARICIÓN FORZADA", "DF"],
            ["DESAPARICIÓN COMETIDA POR PARTICULARES", "DP"],
            ["SECUESTRO", "SEC"],
            ["TRATA DE PERSONAS", "TRAT"],
            ["SUSTRACCIÓN DE MENORES", "SUS"]
        ];

        foreach ($hipotesis as $item) {
            TipoHipotesisInmediata::create([
                'nombre' => $item[0],
                'abreviatura' => $item[1]
            ]);
        }
    }
}
