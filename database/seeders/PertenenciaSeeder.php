<?php

namespace Database\Seeders;

use App\Models\GrupoPertenencia;
use App\Models\Pertenencia;
use Illuminate\Database\Seeder;

class PertenenciaSeeder extends Seeder
{
    public function run(): void
    {
        $prendaId = GrupoPertenencia::where('nombre','Prendas de vestir')->first()->id;
        $alhajaId = GrupoPertenencia::where('nombre','Alhaja')->first()->id;
        $accesorioId = GrupoPertenencia::where('nombre','Accesorio de dama y caballero')->first()->id;
        $otroId = GrupoPertenencia::where('nombre','Otro')->first()->id;

        $prendas = [
            'Abrigo',
            'Alba (vestimenta para sacerdote)',
            'Bañador',
            'Babero',
            'Bata',
            'Bautizo',
            'Bermuda',
            'Bikini',
            'Blusa, Pantiblusa, Blusón',
            'Botas',
            'Brasier',
            'Calcetas',
            'Calcetín',
            'Camisón',
            'Camisa',
            'Camiseta',
            'Camisola',
            'Capa',
            'Chaleco',
            'Chamarra',
            'Conjunto',
            'Coordinado',
            'Corpiño',
            'Delantal',
            'Disfraz',
            'Escolar',
            'Fajero',
            'Falda',
            'Fondo',
            'Gabardina',
            'Guayabera',
            'Hospital',
            'Industrial',
            'Leggings',
            'Leotardo',
            'Mallón',
            'Mameluco',
            'Medias',
            'Militar',
            'Novia',
            'Overol',
            'Pantalón',
            'Pantaleta',
            'Pants',
            'Peto',
            'Pijama',
            'Playera',
            'Policía',
            'Primera comunión',
            'Ropa interior',
            'Saco',
            'Salto de cama',
            'Shorts',
            'Sudadera',
            'Suéter',
            'Tenis',
            'Traje de baño',
            'Traje regional',
            'Traje',
            'Trusa',
            'Vestido',
            'XV años',
            'Zapatillas',
            'Zapatos',
            'Uniforme escolar',
            'Sandalias',
            'No especifica'
        ];

        $alhajas = [
            'Joyería',
            'Relojes de pulso',
            'No especifica'
        ];

        $accesorios = [
            'Anillo',
            'Aretes - Arracadas - Pendientes',
            'Boina',
            'Bolso',
            'Bufanda',
            'Cinturón',
            'Collar - Cadena - Pulsera',
            'Corbata',
            'Estola',
            'Faja',
            'Gorra',
            'Gorro',
            'Guantes',
            'Jorongo - Poncho',
            'Mancuernilla',
            'Máscara - Pañoleta',
            'Monedero',
            'Moño',
            'Pañuelo',
            'Pashmina',
            'Pechera',
            'Peineta - Pasador - Tubos para pelo',
            'Pluma',
            'Rebozo',
            'Sombrero',
            'Tocado',
            'Turbante',
            'Uñas postizas',
            'Mochila'
        ];

        $otros = [
            'No especifica',
            'Otro'
        ];

        sort($prendas);
        sort($alhajas);
        sort($accesorios);
        sort($otros);

        foreach ($prendas as $prenda) {
            Pertenencia::firstOrCreate([
                'grupo_pertenencia_id' => $prendaId,
                'nombre' => $prenda
            ]);
        }

        foreach ($alhajas as $alhaja) {
            Pertenencia::firstOrCreate([
                'grupo_pertenencia_id' => $alhajaId,
                'nombre' => $alhaja
            ]);
        }

        foreach ($accesorios as $accesorio) {
            Pertenencia::firstOrCreate([
                'grupo_pertenencia_id' => $accesorioId,
                'nombre' => $accesorio
            ]);
        }

        foreach ($otros as $otro) {
            Pertenencia::firstOrCreate([
                'grupo_pertenencia_id' => $otroId,
                'nombre' => $otro
            ]);
        }
    }
}
