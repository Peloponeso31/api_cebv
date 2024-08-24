<?php

namespace Database\Seeders;

use App\Models\TipoEnfoqueDiferenciado;
use Illuminate\Database\Seeder;

class TipoEnfoqueDiferenciadoSeeder extends Seeder
{
    public function run(): void
    {
        $enfoquesDiferenciados = [
            "Discapacidad física",
            "Discapacidad intelectual",
            "Discapacidad mental",
            "Discapacidad sensorial",
            "Pertenece a la comunidad LGBTTTIQ",
            "Pertenece a pueblo o comunidad indígena",
            "Habla idioma o lengua indígena",
            "Persona extranjera en México",
            "Periodista",
            "Pertenece a algún sindicato",
            "Pertenece a alguna ONG",
            "Servidor público",
            "Defensora de derechos humanos",
            "Es personal de seguridad pública o privada",
            "Conductor de transporte público",
            "No especifica"
        ];

        foreach ($enfoquesDiferenciados as $enfoqueDiferenciado) {
            TipoEnfoqueDiferenciado::create([
                'nombre' => $enfoqueDiferenciado,
            ]);
        }
    }
}
