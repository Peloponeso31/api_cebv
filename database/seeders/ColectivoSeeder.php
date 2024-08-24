<?php

namespace Database\Seeders;

use App\Models\Colectivo;
use Illuminate\Database\Seeder;

class ColectivoSeeder extends Seeder
{
    public function run(): void
    {
        $colectivos = [
            'Fe y esperanza por un milagro de Dios',
            'Unidas por amor a nuestros desaparecidos',
            'Red de madres buscando a sus hijos Veracruz',
            'Corazones ausentes',
            'Destello de amor por nuestros desaparecidos / Zona Veracruz',
            'Buscando tus huellas Coatzacoalcos',
            'Ayuda a regresar a Luis Alberto Calleja A.C.',
            'Mujeres en búsqueda Nogales',
            'Guerreras en búsqueda Veracruz',
            'Buscando a nuestros desaparecidos y desaparecidas Veracruz',
            'Madres Luna',
            'Buscando con amor y lucha por ustedes',
            'Fe, fuerza y esperanza',
            'Madres en búsqueda Coatzacoalcos / Los Tuxtlas',
            'Unidos por amor a ti',
            'Madres en búsqueda Belén González',
            'Solecito',
            'Familias en búsqueda hasta encontrarles',
            'Enlaces Xalapa',
            'Buscando nos encontramos',
            'La esperanza del reencuentro',
        ];

        foreach ($colectivos as $colectivo) {
            Colectivo::create([
                'nombre' => $colectivo,
            ]);
        }

    }
}
