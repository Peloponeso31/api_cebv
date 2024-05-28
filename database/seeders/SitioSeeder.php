<?php

namespace Database\Seeders;

use App\Models\Informaciones\Sitio;
use Illuminate\Database\Seeder;

class SitioSeeder extends Seeder
{
    public function run(): void
    {
        $sitios = [
            "Anexo",
            "Albergue",
            "Bar",
            "Cementerio",
            "Centros de conversion sexual",
            "Centro penitenciario",
            "Centro religioso",
            "Clinica clandestina",
            "Comercial: Tiendas, Mercados, Plazas, Centros comerciales, Bancos, Gasolineras, Etc",
            "Cuerpo de agua: Rio, Mar, Lago, Laguna, Playa, Etc",
            "Domicilio conocido(Amistad, Conocido o Familia)",
            "Domicilio laboral",
            "Domicilio particular",
            "Fosa clandestina",
            "Hospital",
            "Hotel",
            "Inmueble",
            "Institucion(DIF, Albergues, Centros de resguardo gunernamental)",
            "Institucion educativa",
            "Parque",
            "Restaurante",
            "Reten",
            "Terminal de transporte: Central de transporte de cualquier tipo(Autobus, Taxi, Etc)",
            "Terreno, Parcela, Monte",
            "Tramo carretero",
            "Via publica",
            "Otro",
            "Se desconoce"
        ];

        sort($sitios);

        foreach ($sitios as $sitio) {
            Sitio::create([
                'nombre' => $sitio
            ]);
        }
    }
}
