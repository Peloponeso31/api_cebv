<?php

return [
    'reporte' => [
        'tipo_reporte_id' => 'tipo_reporte.id',
        'area_atiende_id' => 'area_atiende.id',
        'medio_conocimiento_id' => 'medio_conocimiento.id',
        'zona_estado_id' => 'zona_estado.id',
        'hipotesis_oficial_id' => 'hipotesis_oficial.id',
        'institucion_origen_id' => 'institucion_origen.id',
        'estado_id' => 'estado.id'
    ],

    'reportante' => [
        'persona_id' => 'persona.id',
        'parentesco_id' => 'parentesco.id',
        'colectivo_id' => 'colectivo.id',
    ],

    'desaparecido' => [
        'persona_id' => 'persona.id',
        'estatus_rpdno_id' => 'estatus_rpdno.id',
        'estatus_cebv_id' => 'estatus_cebv.id',
    ],

    'persona' => [
        'sexo_id' => 'sexo.id',
        'genero_id' => 'genero.id',
        'religion_id' => 'religion.id',
        'lengua_id' => 'lengua.id',
        'razon_curp_id' => 'razon_curp.id',
        'lugar_nacimiento_id' => 'lugar_nacimiento.id',
    ],

    'telefono' => [
        'compania_id' => 'compania.id',
    ],

    'estudios' => [
        'escolaridad_id' => 'escolaridad.id',
        'estatus_escolaridad_id' => 'estatus_escolaridad.id',
    ],

    'contexto_familiar' => [
        'estado_conyugal_id' => 'estado_conyugal.id',
    ],
];
