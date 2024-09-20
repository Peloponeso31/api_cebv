<?php

namespace Database\Seeders;

use App\Models\Personas\Parentesco;
use Illuminate\Database\Seeder;

class ParentescoSeeder extends Seeder
{
    public function run(): void
    {
        $parentescos = [
            'ABOGADO(A)',
            'ABUELO(A)',
            'AMIGO(A)/CONOCIDO(A)',
            'CLERO',
            'COMPADRE/COMADRE',
            'COMPAÑERO(A)/ESPOSO(A)',
            'CONCUBINA',
            'CONCUBINARIO',
            'CONTACTO DE EMPLEO',
            'CONYUGE',
            'CUÑADO(A)',
            'EMPLEADO(A)',
            'EXPAREJA',
            'GEMELO(A)',
            'HERMANO(A)',
            'HIJO(A)',
            'HIJO(A) ADOPTIVO(A)',
            'HIJASTRO(A)',
            'JEFE(A) DE SU EMPLEO',
            'MADRASTRA',
            'MADRE',
            'MADRE ADOPTIVA',
            'MADRINA',
            'MEDIO HERMANO(A) MATERNO(A)',
            'MEDIO HERMANO(A) PATERNO(A)',
            'NIETO(A)',
            'NOVIO(A)',
            'NUERA',
            'ORGANIZACION NO GUBERNAMENTAL (ONG)',
            'PADRASTRO',
            'PADRE',
            'PADRE ADOPTIVO',
            'PADRINO',
            'PAREJA EXTRAMATRIMONIAL',
            'PRIMO(A)',
            'SOBRINO(A)',
            'SUEGRO(A)',
            'TIO(A)',
            'TUTOR(A)',
            'VECINO(A)',
            'YERNO',
            'OTRO PARENTESCO',
            'SIN PARENTESCO',
            'NO ESPECIFICA'
        ];

        foreach ($parentescos as $parentesco) {
            Parentesco::create([
                'nombre' => $parentesco,
            ]);
        }
    }
}
