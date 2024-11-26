<?php

namespace Database\Seeders;

use App\Models\Catalogos\Puesto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $puestos = [
            'Analista Administrativo', // Importante ser el primero en la lista, usuario predeterminado.
            'Comisionado Estatal de Búsqueda de Personas',
            'Jefe de Departamento Especializado de Búsqueda',
            'Jefe de Departamento de Análisis de Contexto',
            'Jefe de Departamento de Vinculación Interinstitucional y Asuntos Jurídicos',
            'Jefe de Oficina de Búsqueda Inmediata',
            'Jefe de Oficina de Gestión Procesamiento de Información',
            'Jefe de Oficina de Larga Data',
            'Jefe de Oficina de Análisis de Contexto',
            'Jefe de Oficina de Vinculación Interinstitucional',
            'Jefe de Oficina de Asuntos Jurídicos',
        ];

        foreach ($puestos as $puesto) {
            Puesto::create(["nombre" => $puesto]);
        }
    }
}
