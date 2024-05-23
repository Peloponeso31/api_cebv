<?php

namespace Database\Seeders;

use App\Models\UsoVehiculo;
use Illuminate\Database\Seeder;

class UsoVehiculoSeeder extends Seeder
{
    public function run(): void
    {
        $usos_vehiculos = [
            'Abarrotes',
            'Alimentos Varios',
            'Anuncios',
            'Articulos Deportivos',
            'Articulos Para El Hogar',
            'Aves y Derivados',
            'Banquetes',
            'Bebidas Embotelladas',
            'Carga en General',
            'Carnes y Derivados',
            'Comida Rapida',
            'Corrosivos',
            'Desperdicios Industriales No Peligrosos',
            'Efectivo y Valores',
            'Escolar',
            'Explosivos',
            'Flores',
            'Flores Frutas Legumbres y Abarrotes',
            'Funerarios',
            'Ganado en General',
            'Gases Comprimidos Refigerados Licuados Disueltos a Presion Herreria',
            'Hielo',
            'Indeterminado',
            'Jardineria y Similar',
            'Lacteos y Derivados',
            'Lavanderia y Tintoreria',
            'Liquidos Inflamables',
            'Litografia y Papeleria',
            'Maquinaria y Equipo en General',
            'Materiales de Construccion',
            'Materiales Electricos',
            'Mensajeria',
            'Mudanzas',
            'Muebles en General',
            'Nupcial',
            'Oficial',
            'Otros',
            'Oxidantes y Peroxidos Organicos',
            'Pan y Similares',
            'Papel Industrial',
            'Papeleria en General',
            'Partes Automotrices y Refacciones en General',
            'Particular',
            'Peleteria',
            'Productos Agricolas',
            'Productos Forestales',
            'Productos Marinos',
            'Productos Quimicos No Peligrosos',
            'Pulque',
            'Radiactivos',
            'Servicio Publico',
            'Solidos Inflamables',
            'Textiles',
            'Toxicos Agudos (Venenos) y Agentes Infecciosos',
            'Transporte en General',
            'Turisticos',
            'Varios',
            'Vidrieria',
        ];

        foreach ($usos_vehiculos as $uso_vehiculo) {
            UsoVehiculo::create(['nombre' => $uso_vehiculo]);
        }

    }
}
