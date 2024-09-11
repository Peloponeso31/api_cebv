<?php

namespace App\Services;

use App\Models\Reportes\Reporte;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ReporteFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function applyFilter()
    {
        return QueryBuilder::for(Reporte::class)
            ->allowedFilters([
                //Estado
                AllowedFilter::partial('estado/nombre', 'estado.nombre'),
                AllowedFilter::partial('estado/abreviatura_inegi', 'estado.abreviatura_inegi'),
                AllowedFilter::partial('estado/abreviatura_cebv', 'estado.abreviatura_cebv'),
                AllowedFilter::exact('estado_id'),

                //Tipo reporte
                AllowedFilter::partial('tipo_reporte/nombre', 'tipoReporte.nombre'),
                AllowedFilter::exact('tipo_reporte_id'),
                AllowedFilter::partial('tipo_reporte/abreviatura', 'tipoReporte.abreviatura'),

                //Medio conocimiento
                AllowedFilter::partial('medio_conocimiento/nombre', 'medioConocimiento.nombre'),
                AllowedFilter::exact('medio_conocimiento_id'),

                //Tipo medio
                AllowedFilter::callback('tipo_medio/nombre', function ($query, $value) {
                    $query->join('medios as m', 'reportes.medio_conocimiento_id', '=', 'm.id')
                    ->join('tipos_medios as tm', 'm.tipo_medio_id', '=', 'tm.id')
                    ->where('tm.nombre', 'like', ["%{$value}%"])
                    ->select('reportes.*');
                }),
                AllowedFilter::partial('tipo_medio_id', 'medioConocimiento.tipo_medio_id'),

                //Nombe persona desaparecida
                AllowedFilter::callback('nombreCompleto_desaparecido', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->whereRaw("CONCAT(p.nombre, ' ', p.apellido_paterno, ' ', p.apellido_materno) LIKE ?", ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('nombre_desaparecido', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('apellidoPaterno_desaparecido', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.apellido_paterno', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('apellidoMaterno_desaparecido', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.apellido_materno', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                //pseudonimo persona desaparecida
                AllowedFilter::callback('pseudonimoCompleto_desaparecido', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->whereRaw("CONCAT(p.pseudonimo_nombre, ' ', p.pseudonimo_apellido_paterno, ' ', p.pseudonimo_apellido_materno) LIKE ?", ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('pseudonimoApellidoPaterno_desaparecido', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.pseudonimo_apellido_paterno', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('pseudonimoApellidoMaterno_desaparecido', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.pseudonimo_apellido_materno', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),

                //Nombre persona reportante
                AllowedFilter::callback('nombreCompleto_reportante', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->whereRaw("CONCAT(p.nombre, ' ', p.apellido_paterno, ' ', p.apellido_materno) LIKE ?", ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('nombre_reportante', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('apellidoPaterno_reportante', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.apellido_paterno', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('apellidoMaterno_reportante', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.apellido_materno', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                // Pseudónimo persona reportante
                AllowedFilter::callback('pseudonimoCompleto_reportante', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->whereRaw("CONCAT(p.pseudonimo_nombre, ' ', p.pseudonimo_apellido_paterno, ' ', p.pseudonimo_apellido_materno) LIKE ?", ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('pseudonimoNombre_reportante', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.pseudonimo_nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('pseudonimoApellidoPaterno_reportante', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.pseudonimo_apellido_paterno', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('pseudonimoApellidomaterno_reportante', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.pseudonimo_apellido_materno', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),

                //Terminado
                AllowedFilter::exact('esta_terminado'),

                //Area atiende
                AllowedFilter::partial('area_atiende/nombre', 'areaAtiende.nombre'),
                AllowedFilter::exact('area_atiende_id'),

                //Zona estado
                AllowedFilter::partial('zona_estado/nombre', 'zonaEstado.nombre'),
                AllowedFilter::partial('zona_estado/abreviatura', 'zonaEstado.abreviatura'),
                AllowedFilter::exact('zona_estado_id'),

                //Hipotesis oficial
                AllowedFilter::exact('hipotesis_oficial_id'),
                AllowedFilter::partial('hipotesisOficial/descripcion', 'hipotesisOficial.descripcion'),
                AllowedFilter::partial('hipotesisOficial/abreviatura', 'hipotesisOficial.abreviatura'),
                AllowedFilter::callback('hipotesisOficial/circunstancia_id', function ($query, $value) {
                    $query->join('tipos_hipotesis as th', 'reportes.hipotesis_oficial_id', '=', 'th.id')
                        ->join('circunstancias as c', 'th.circunstancia_id', '=', 'c.id')
                        ->where('c.id', 'like', "%{$value}%")
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('hipotesisOficial/circunstancia', function ($query, $value) {
                    $query->join('tipos_hipotesis as th', 'reportes.hipotesis_oficial_id', '=', 'th.id')
                        ->join('circunstancias as c', 'th.circunstancia_id', '=', 'c.id')
                        ->where('c.descripcion', 'like', "%{$value}%")
                    ->select('reportes.*');
                }),

                //Persona reportante
                AllowedFilter::callback('reportante/lugar_nacimiento_id', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('estados as e', 'p.lugar_nacimiento_id', '=', 'e.id')
                        ->where('e.id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/lugar_nacimiento', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('estados as e', 'p.lugar_nacimiento_id', '=', 'e.id')
                        ->where('e.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/fecha_nacimiento', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.fecha_nacimiento', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/curp', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.curp', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/rfc', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.rfc', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/ocupacion', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.ocupacion', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/nivel_escolaridad', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.nivel_escolaridad', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/escolaridad_id', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.escolaridad_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/escolaridad', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('escolaridades as e', 'p.escolaridad_id', '=', 'e.id')
                        ->where('e.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/sexo_id', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.sexo_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/sexo', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('sexos as s', 'p.sexo_id', '=', 's.id')
                        ->where('s.sexo', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/genero_id', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.genero_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/genero', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('generos as g', 'p.genero_id', '=', 'g.id')
                        ->where('g.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/apodo', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('apodos as a', 'p.id', '=', 'a.persona_id')
                        ->whereRaw("CONCAT(a.nombre, ' ', a.apellido_paterno, ' ', a.apellido_materno) LIKE ?", ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/nacionalidad_id', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('nacionalidad_persona as np', 'p.id', '=', 'np.persona_id')
                        ->where('p.nacionalidad_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/nacionalidad', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('nacionalidad_persona as np', 'p.id', '=', 'np.persona_id')
                        ->join('nacionalidades as n', 'np.nacionalidad_id', '=', 'n.id')
                        ->where('n.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/religion_id', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.religion_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/religion', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('religiones as re', 'p.religion_id', '=', 're.id')
                        ->where('re.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/lengua_id', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.lengua_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/lengua', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('lenguas as l', 'p.lengua_id', '=', 'l.id')
                        ->where('l.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/telefono', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('telefonos as t', 'p.id', '=', 't.persona_id')
                        ->where('t.numero', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/telefono/compania_id', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('telefonos as t', 'p.id', '=', 't.persona_id')
                        ->where('t.compania_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/telefono/compania', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('telefonos as t', 'p.id', '=', 't.persona_id')
                        ->join('companias_telefonicas as ct', 't.compania_id', '=', 'ct.id')
                        ->where('ct.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/telefono/es_movil', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('telefonos as t', 'p.id', '=', 't.persona_id')
                        ->where('t.es_movil', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),

                //Reportante
                AllowedFilter::callback('reportante/parentesco_id', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('parentescos as p', 'r.parentesco_id', '=', 'p.id')
                        ->where('p.id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/parentesco', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('parentescos as p', 'r.parentesco_id', '=', 'p.id')
                        ->where('p.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/colectivo_id', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('colectivos as p', 'r.parentesco_id', '=', 'c.id')
                        ->where('c.id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/colectivo', function ($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('colectivos as p', 'r.parentesco_id', '=', 'c.id')
                        ->where('c.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::exact('denuncia_anonima'),
                AllowedFilter::exact('informacion_consentimiento'),
                AllowedFilter::exact('informacion_exclusiva_busqueda'),
                AllowedFilter::exact('publicacion_registro_nacional'),
                AllowedFilter::exact('publicacion_boletin'),
                AllowedFilter::exact('reportante/pertenencia_colectivo', 'pertenencia_colectivo'),
                AllowedFilter::partial('informacion_relevante'),
                AllowedFilter::partial('participacion_busqueda'),
                AllowedFilter::partial('descripcion_extorsion'),
                AllowedFilter::partial('descripcion_donde_proviene'),
                AllowedFilter::exact('reportante/edad_estimada', 'edad_estimada'),
                AllowedFilter::callback('reportante/estado_conyugal_id', function($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.estado_conyugal_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/estado_conyugal', function($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->join('estados_conyugales as ec', 'p.estado_conyugal_id', '=', 'ec.id')
                        ->where('ec.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('reportante/numero_personas_vive', function($query, $value) {
                    $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                        ->join('personas as p', 'r.persona_id', '=', 'p.id')
                        ->where('p.numero_personas_vive', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),

                //Persona desaparecida
                AllowedFilter::callback('desaparecido/lugar_nacimiento_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('estados as e', 'p.lugar_nacimiento_id', '=', 'e.id')
                        ->where('e.id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/lugar_nacimiento', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('estados as e', 'p.lugar_nacimiento_id', '=', 'e.id')
                        ->where('e.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/fecha_nacimiento', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.fecha_nacimiento', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/curp', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.curp', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/rfc', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.rfc', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/ocupacion', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.ocupacion', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/nivel_escolaridad', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.nivel_escolaridad', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/escolaridad_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.escolaridad_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/escolaridad', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('escolaridades as e', 'p.escolaridad_id', '=', 'e.id')
                        ->where('e.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/sexo_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.sexo_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/sexo', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('sexos as s', 'p.sexo_id', '=', 's.id')
                        ->where('s.sexo', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/genero_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.genero_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/genero', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('generos as g', 'p.genero_id', '=', 'g.id')
                        ->where('g.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/apodo', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('apodos as a', 'p.id', '=', 'a.persona_id')
                        ->whereRaw("CONCAT(a.nombre, ' ', a.apellido_paterno, ' ', a.apellido_materno) LIKE ?", ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/nacionalidad_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('nacionalidad_persona as np', 'p.id', '=', 'np.persona_id')
                        ->where('p.nacionalidad_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/nacionalidad', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('nacionalidad_persona as np', 'p.id', '=', 'np.persona_id')
                        ->join('nacionalidades as n', 'np.nacionalidad_id', '=', 'n.id')
                        ->where('n.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/religion_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.religion_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/religion', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('religiones as re', 'p.religion_id', '=', 're.id')
                        ->where('re.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/lengua_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->where('p.lengua_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/lengua', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('lenguas as l', 'p.lengua_id', '=', 'l.id')
                        ->where('l.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/telefono', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('telefonos as t', 'p.id', '=', 't.persona_id')
                        ->where('t.numero', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/telefono/compania_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('telefonos as t', 'p.id', '=', 't.persona_id')
                        ->where('t.compania_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/telefono/compania', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('telefonos as t', 'p.id', '=', 't.persona_id')
                        ->join('companias_telefonicas as ct', 't.compania_id', '=', 'ct.id')
                        ->where('ct.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/telefono/es_movil', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('telefonos as t', 'p.id', '=', 't.persona_id')
                        ->where('t.es_movil', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),

                //Desaparecido
                AllowedFilter::callback('desaparecido/estatus_rpdno_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.estatus_rpdno_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/estatus_rpdno', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('estatus_personas as ep', 'd.estatus_rpdno_id', '=', 'ep.id')
                        ->where('et.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/estatus_rpdno/abreviatura', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('estatus_personas as ep', 'd.estatus_rpdno_id', '=', 'ep.id')
                        ->where('et.abreviatura', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/estatus_cebv_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.estatus_cebv_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/estatus_cebv', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('estatus_personas as ep', 'd.estatus_cebv_id', '=', 'ep.id')
                        ->where('et.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/estatus_cebv/abreviatura', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('estatus_personas as ep', 'd.estatus_cebv_id', '=', 'ep.id')
                        ->where('et.abreviatura', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/ocupacion_principal_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.estatus_cebv_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/ocupacion_principal', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('ocupacion_principal as op', 'd.ocupacion_principal_id', '=', 'op.id')
                        ->join('ocupaciones as o', 'op.ocupacion_id', '=', 'o.id')
                        ->where('op.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/ocupacion_principal/tipo_ocupacion_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('ocupacion_principal as op', 'd.ocupacion_principal_id', '=', 'op.id')
                        ->join('ocupaciones as o', 'op.ocupacion_id', '=', 'o.id')
                        ->where('op.tipo_ocupacion_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/ocupacion_principal/tipo_ocupacion', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('ocupacion_principal as op', 'd.ocupacion_principal_id', '=', 'op.id')
                        ->join('ocupaciones as o', 'op.ocupacion_id', '=', 'o.id')
                        ->join('tipos_ocupacion as to', 'o.tipo_ocupacion_id', '=', 'to.id')
                        ->where('to.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/clasificacion_persona', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.clasificacion_persona', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/habla_espanhol', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.habla_espanhol', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/sabe_leer', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.sabe_leer', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/sabe_escribir', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.sabe_escribir', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/url_boletin', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.url_boletin', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/declaracion_especial_ausencia', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.declaracion_especial_ausencia', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/accion_urgente', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.accion_urgente', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/dictamen', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.dictamen', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/ci_nivel_federal', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.ci_nivel_federal', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/otro_derecho_humano', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.otro_derecho_humano', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/fecha_nacimiento_aproximada', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.fecha_nacimiento_aproximada', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/fecha_nacimiento_cebv', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.fecha_nacimiento_cebv', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/edad_momento_desaparicion/anos', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.edad_momento_desaparicion_anos', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/edad_momento_desaparicion/meses', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.edad_momento_desaparicion_meses', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/edad_momento_desaparicion/dias', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.edad_momento_desaparicion_dias', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/identidad_resguardada', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.identidad_resguardada', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/alias', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.alias', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/alias', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.alias', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/descripcion_ocupacion_principal', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.descripcion_ocupacion_principal', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/descripcion_ocupacion_secundaria', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.descripcion_ocupacion_secundaria', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/nombre_pareja_conyugue', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.nombre_pareja_conyugue', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/boletin_img_path', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->where('d.boletin_img_path', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),

                //Folios
                AllowedFilter::partial('folio_cebv', 'folios.folio_cebv'),
                AllowedFilter::partial('folio_fub', 'folios.folio_fub'),

                //Hechos desaparicion
                AllowedFilter::partial('hechoDesaparicion/fecha_desaparicion',
                    'hechoDesaparicion.fecha_desaparicion'),
                AllowedFilter::partial('hechoDesaparicion/descripcion_amenaza',
                    'hechoDesaparicion.descripcion_amenaza'),
                AllowedFilter::partial('hechoDesaparicion/descripcion/cambio_comportamiento',
                    'hechoDesaparicion.descripcion_cambio_comportamiento'),

                //Señas particulares
                AllowedFilter::callback('desaparecido/senas_particulares_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                        ->where('sp.id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/senas_particulares/region_cuerpo_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                        ->where('sp.region_cuerpo_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/senas_particulares/region_cuerpo', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                        ->join('region_cuerpo as rc', 'sp.region_cuerpo_id', '=', 'rc.id')
                        ->where('rc.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/senas_particulares/region_cuerpo/color', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                        ->join('region_cuerpo as rc', 'sp.region_cuerpo_id', '=', 'rc.id')
                        ->where('rc.color', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/senas_particulares/vista_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                        ->where('sp.vista_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/senas_particulares/vista', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                        ->join('vistas as v', 'sp.vista_id', '=', 'v.id')
                        ->where('v.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/senas_particulares/lado_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                        ->where('sp.lado_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/senas_particulares/lado', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                        ->join('lados as l', 'sp.lado_id', '=', 'l.id')
                        ->where('l.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/senas_particulares/lado/color', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                        ->join('lados as l', 'sp.lado_id', '=', 'l.id')
                        ->where('l.color', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/senas_particulares/tipo_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                        ->where('sp.tipo_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/senas_particulares/tipo', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                        ->join('tipos as t', 'sp.tipo_id', '=', 't.id')
                        ->where('t.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/senas_particulares/cantidad', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                        ->where('sp.cantidad', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/senas_particulares/descripcion', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                        ->where('sp.descripcion', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),

                //Media filiacion
                AllowedFilter::callback('desaparecido/media_filiacion_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->where('mf.id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/estatura', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->where('mf.estatura', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/peso', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->where('mf.peso', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/complexion_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->where('mf.complexion_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/complexion', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->join('complexiones as c', 'mf.complexion_id', '=', 'c.id')
                        ->where('c.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/color_piel_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->where('mf.color_piel_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/color_piel', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->join('colores_pieles as cp', 'mf.color_piel_id', '=', 'cp.id')
                        ->where('cp.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/color_ojos_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->where('mf.color_ojos_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/color_ojos', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->join('colores_ojos as co', 'mf.color_ojos_id', '=', 'co.id')
                        ->where('co.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/color_cabello_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->where('mf.color_cabello_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/color_cabello', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->join('colores_cabellos as cc', 'mf.color_cabello_id', '=', 'cc.id')
                        ->where('cc.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/tamano_cabello_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->where('mf.tamano_cabello_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/tamano_cabello', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->join('tamanos_cabellos as tc', 'mf.tamano_cabello_id', '=', 'tc.id')
                        ->where('tc.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/tipo_cabello_id', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->where('mf.tipo_cabello_id', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),
                AllowedFilter::callback('desaparecido/media_filiacion/tipo_cabello', function ($query, $value) {
                    $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                        ->join('personas as p', 'd.persona_id', '=', 'p.id')
                        ->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                        ->join('tipo_cabellos as tc', 'mf.tipo_cabello_id', '=', 'tc.id')
                        ->where('tc.nombre', 'LIKE', ["%{$value}%"])
                        ->select('reportes.*');
                }),

                //Fecha localizacion
                AllowedFilter::partial('fecha_localizacion'),

                //Sintesis localizacion
                AllowedFilter::partial('sintesis_localizacion'),

                //Institutcion origen
                AllowedFilter::partial('institucion_origen'),

                //Declaracion especial ausencia
                AllowedFilter::partial('declaracion_especial_ausencia'),

                //Accion urgente
                AllowedFilter::exact('accion_urgente'),

                //Dictamen
                AllowedFilter::exact('dictamen'),

                //ci nivel federal
                AllowedFilter::exact('ci_nivel_federal'),

                //Otro derecho humano
                AllowedFilter::partial('otro_derecho_humano'),

                //Fecha creacion reporte
                AllowedFilter::partial('fecha_creacion'),

                //Fecha actualizacion reporte
                AllowedFilter::partial('fecha_actualizacion')
            ]);
    }
}
