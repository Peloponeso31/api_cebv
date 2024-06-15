<?php

namespace Database\Seeders;

use App\Models\Ocupacion;
use App\Models\TipoOcupacion;
use Illuminate\Database\Seeder;

class OcupacionSeeder extends Seeder
{
    public function run(): void
    {
        $doctor = TipoOcupacion::where('nombre', 'Doctor')->first()->id;
        $contador = TipoOcupacion::where('nombre', 'Contador')->first()->id;
        $vendedor = TipoOcupacion::where('nombre', 'Vendedor')->first()->id;
        $abogado = TipoOcupacion::where('nombre', 'Abogado')->first()->id;
        $ingeniero = TipoOcupacion::where('nombre', 'Ingeniero')->first()->id;
        $maestro = TipoOcupacion::where('nombre', 'Maestro')->first()->id;
        $arquitecto = TipoOcupacion::where('nombre', 'Arquitecto')->first()->id;
        $administrador = TipoOcupacion::where('nombre', 'Administrador')->first()->id;

        $ocupacionesEspecificasDoctor = [
            'Médico General',
            'Pediatra',
            'Cirujano',
            'Ginecólogo',
            'Dermatólogo',
            'Otro'
        ];

        $ocupacionesEspecificasContador = [
            'Público',
            'Fiscal',
            'Auditor',
            'Contador de Costos',
            'Contador Gubernamental',
            'Otro' // Opción adicional para "Otro"
        ];

        $ocupacionesEspecificasVendedor = [
            'De Tienda',
            'Vendedor ambulante',
            'Vendedor Online',
            'Vendedor de Telemarketing',
            'Otro' // Opción adicional para "Otro"
        ];

        $ocupacionesEspecificasAbogado = [
            'Civil',
            'Penal',
            'Laboral',
            'Mercantil',
            'Familiar',
            'Otro' // Opción adicional para "Otro"
        ];

        $ocupacionesEspecificasIngeniero = [
            'Civil',
            'Mecánico',
            'Eléctrico',
            'Electrónico',
            'Industrial',
            'Informático',
            'Químico',
            'Biomédico',
            'Ambiental',
            'Otro' // Opción adicional para "Otro"
        ];

        $ocupacionesEspecificasMaestro = [
            'Preescolar',
            'Primaria',
            'Secundaria / Telesecundaria',
            'Preparatoria',
            'Universidad',
            'Educación Especial',
            'Inglés',
            'Matemáticas',
            'Ciencias',
            'Historia',
            'Español',
            'Educación Física',
            'Música',
            'Tecnología',
            'Otro' // Opción adicional para "Otro"
        ];

        $ocupacionesEspecificasArquitecto = [
            'Interiores',
            'Paisajista',
            'Urbanista',
            'Bioclimático',
            'Proyectos',
            'Software',
            'Otro' // Opción adicional para "Otro"
        ];

        $ocupacionesEspecificasAdministrador = [
            'De Empresas',
            'Recursos Humanos',
            'De Proyectos',
            'Finanzas',
            'Operaciones',
            'Marketing',
            'Sistemas de Información',
            'Público',
            'Otro' // Opción adicional para "Otro"
        ];

        foreach ($ocupacionesEspecificasDoctor as $ocupacion) {
            Ocupacion::create([
                'nombre' => $ocupacion,
                'tipo_ocupacion_id' => $doctor
            ]);
        }

        foreach ($ocupacionesEspecificasContador as $ocupacion) {
            Ocupacion::create([
                'nombre' => $ocupacion,
                'tipo_ocupacion_id' => $contador
            ]);
        }

        foreach ($ocupacionesEspecificasVendedor as $ocupacion) {
            Ocupacion::create([
                'nombre' => $ocupacion,
                'tipo_ocupacion_id' => $vendedor
            ]);
        }

        foreach ($ocupacionesEspecificasAbogado as $ocupacion) {
            Ocupacion::create([
                'nombre' => $ocupacion,
                'tipo_ocupacion_id' => $abogado
            ]);
        }

        foreach ($ocupacionesEspecificasIngeniero as $ocupacion) {
            Ocupacion::create([
                'nombre' => $ocupacion,
                'tipo_ocupacion_id' => $ingeniero
            ]);
        }

        foreach ($ocupacionesEspecificasMaestro as $ocupacion) {
            Ocupacion::create([
                'nombre' => $ocupacion,
                'tipo_ocupacion_id' => $maestro
            ]);
        }

        foreach ($ocupacionesEspecificasArquitecto as $ocupacion) {
            Ocupacion::create([
                'nombre' => $ocupacion,
                'tipo_ocupacion_id' => $arquitecto
            ]);
        }

        foreach ($ocupacionesEspecificasAdministrador as $ocupacion) {
            Ocupacion::create([
                'nombre' => $ocupacion,
                'tipo_ocupacion_id' => $administrador
            ]);
        }
    }
}
