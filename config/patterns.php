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

    'hecho_desaparicion' => [
        'direccion_id' => 'direccion.id',
    ],

    'hipotesis' => [
        'tipo_hipotesis_id' => 'tipo_hipotesis.id',
        'sitio_id' => 'sitio.id',
        'area_asigna_sitio_id' => 'area_asigna_sitio.id',
    ],

    'expediente' => [
        'persona_id' => 'persona.id',
        'parentesco_id' => 'parentesco.id',
    ],

    'desaparicion_forzada' => [
        'autoridad_id' => 'autoridad.id',
        'particular_id' => 'particular.id',
        'metodo_captura_id' => 'metodo_captura.id',
        'medio_captura_id' => 'medio_captura.id',
    ],

    'perpetrador' => [
        'sexo_id' => 'sexo.id',
        'estatus_perpetrador_id' => 'estatus_perpetrador.id',
    ],

    'persona' => [
        'sexo_id' => 'sexo.id',
        'genero_id' => 'genero.id',
        'religion_id' => 'religion.id',
        'lengua_id' => 'lengua.id',
        'razon_curp_id' => 'razon_curp.id',
        'lugar_nacimiento_id' => 'lugar_nacimiento.id',
    ],

    'condicion_salud' => [
        'tipo_condicion_salud_id' => 'tipo_condicion_salud.id',
    ],

    'direccion' => [
        'asentamiento_id' => 'asentamiento.id',
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

    'salud' => [
        'tipo_sangre_id' => 'tipo_sangre.id',
        'complexion_id' => 'complexion.id',
        'color_piel_id' => 'color_piel.id',
        'forma_cara_id' => 'forma_cara.id',
    ],

    'ojos' => [
        'color_ojos_id' => 'color_ojos.id',
        'forma_ojos_id' => 'forma_ojos.id',
        'tamano_ojos_id' => 'tamano_ojos.id',
    ],

    'cabello' => [
        'calvicie_id' => 'calvicie.id',
        'color_cabello_id' => 'color_cabello.id',
        'tamano_cabello_id' => 'tamano_cabello.id',
        'tipo_cabello_id' => 'tipo_cabello.id',
    ],

    'vello_facial' => [
        'cejas_id' => 'cejas.id',
    ],

    'nariz' => [
        'tipo_nariz_id' => 'tipo_nariz.id',
    ],

    'boca' => [
        'tamano_boca_id' => 'tamano_boca.id',
        'tamano_labios_id' => 'tamano_labios.id',
    ],

    'orejas' => [
        'tamano_orejas_id' => 'tamano_orejas.id',
        'forma_orejas_id' => 'forma_orejas.id',
    ],

    'media_filiacion_complementaria' => [
        'tipo_menton_id' => 'tipo_menton.id',
    ],

    'intervencion_quirurgica' => [
        'tipo_intervencion_quirurgica_id' => 'tipo_intervencion_quirurgica.id',
    ],

    'enfermedad_piel' => [
        'tipo_enfermedad_piel_id' => 'tipo_enfermedad_piel.id',
    ],

    'prenda_vestir' => [
        'pertenencia_id' => 'pertenencia.id',
        'color_id' => 'color.id',
    ],

    'sena_particular' => [
        'region_cuerpo_id' => 'region_cuerpo.id',
        'vista_id' => 'vista.id',
        'lado_id' => 'lado.id',
        'tipo_id' => 'tipo.id',
    ],

    'contexto_social' => [
        'situacion_migratoria_id' => 'situacion_migratoria.id',
    ],

    'enfoque_personal' => [
        'tipo_enfoque_diferenciado_id' => 'tipo_enfoque_diferenciado.id',
    ],
];
