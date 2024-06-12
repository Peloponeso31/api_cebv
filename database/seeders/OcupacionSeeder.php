<?php

namespace Database\Seeders;

use App\Models\Ocupacion;
use Illuminate\Database\Seeder;

class OcupacionSeeder extends Seeder
{
    public function run(): void
    {
        // TODO: Cambiar las ocupaciones por las que se necesiten
        $ocupaciones = [
            'Estudiante',
            'Desarrollador',
            'Diseñador',
            'Ingeniero',
            'Médico',
            'Abogado',
            'Carpintero',
            'Electricista',
            'Plomero',
            'Mecánico',
            'Pintor',
            'Albañil',
            'Conductor',
            'Cocinero',
            'Mesero',
            'Cajero',
            'Vendedor',
            'Repartidor',
            'Agricultor',
            'Pescador',
            'Minero',
            'Policía',
            'Bombero',
            'Militar',
            'Piloto',
            'Astronauta',
            'Científico',
            'Escritor',
            'Artista',
            'Músico',
            'Actor',
            'Deportista',
            'Entrenador',
            'Árbitro',
            'Periodista',
            'Locutor',
            'Presentador',
            'Youtuber',
            'Influencer',
            'Modelo',
            'Fotógrafo',
            'Videógrafo',
            'Editor',
            'Productor',
            'Director',
            'Guionista',
            'Animador',
            'Doblajista',
            'Traductor',
            'Corrector',
            'Editorialista',
            'Columnista',
            'Reportero',
            'Corresponsal',
            'Fotoperiodista',
            'Camarógrafo',
            'Reportero gráfico',
            'Editor de video',
            'Productor de video',
            'Director de video',
            'Guionista',
            'Animador de video',
            'Ama de casa',
            'Jubilado',
            'Desempleado',
            'Empresario',
            'Comerciante',
            'Inversionista',
            'Consultor',
            'Asesor',
            'Coach',
            'Mentor',
            'Auditor',
            'Contador',
        ];

        sort($ocupaciones);

        foreach ($ocupaciones as $ocupacion) {
            Ocupacion::create([
                'nombre' => $ocupacion,
            ]);
        }
    }
}
