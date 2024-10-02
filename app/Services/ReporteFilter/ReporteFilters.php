<?php

namespace App\Services\ReporteFilter;

use App\Models\Reportes\Reporte;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ReporteFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function applyFilter()
    {
        $query = QueryBuilder::for(Reporte::class)
            ->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
            ->join('personas as p', 'd.persona_id', '=', 'p.id')
            ->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
            ->join('personas as pr', 'r.persona_id', '=', 'pr.id')
            ->select('reportes.*');

        $query = $query->allowedFilters([
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
                    ->where('tm.nombre', 'like', ["%{$value}%"]);
            }),
            AllowedFilter::partial('tipo_medio_id', 'medioConocimiento.tipo_medio_id'),

            //Nombe persona desaparecida
            AllowedFilter::callback('nombreCompleto_desaparecido', function ($query, $value) {
                $query->whereRaw("CONCAT(p.nombre, ' ', p.apellido_paterno, ' ', p.apellido_materno) LIKE ?", ["%{$value}%"]);
            }),
            AllowedFilter::callback('nombre_desaparecido', function ($query, $value) {
                $query->where('p.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('apellidoPaterno_desaparecido', function ($query, $value) {
                $query->where('p.apellido_paterno', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('apellidoMaterno_desaparecido', function ($query, $value) {
                $query->where('p.apellido_materno', 'LIKE', ["%{$value}%"]);
            }),
            //pseudonimo persona desaparecida
            AllowedFilter::callback('pseudonimoCompleto_desaparecido', function ($query, $value) {
                $query->whereRaw("CONCAT(p.pseudonimo_nombre, ' ', p.pseudonimo_apellido_paterno, ' ', p.pseudonimo_apellido_materno) LIKE ?", ["%{$value}%"]);
            }),
            AllowedFilter::callback('pseudonimoNombre_desaparecido', function ($query, $value) {
                $query->where('p.pseudonimo_nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('pseudonimoApellidoPaterno_desaparecido', function ($query, $value) {
                $query->where('p.pseudonimo_apellido_paterno', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('pseudonimoApellidoMaterno_desaparecido', function ($query, $value) {
                $query->where('p.pseudonimo_apellido_materno', 'LIKE', ["%{$value}%"]);
            }),

            //Nombre persona reportante
            AllowedFilter::callback('nombreCompleto_reportante', function ($query, $value) {
                $query->whereRaw("CONCAT(pr.nombre, ' ', pr.apellido_paterno, ' ', pr.apellido_materno) LIKE ?", ["%{$value}%"]);
            }),
            AllowedFilter::callback('nombre_reportante', function ($query, $value) {
                $query->where('pr.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('apellidoPaterno_reportante', function ($query, $value) {
                $query
                    ->where('pr.apellido_paterno', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('apellidoMaterno_reportante', function ($query, $value) {
                $query
                    ->where('pr.apellido_materno', 'LIKE', ["%{$value}%"]);
            }),
            // Pseudónimo persona reportante
            AllowedFilter::callback('pseudonimoCompleto_reportante', function ($query, $value) {
                $query
                    ->whereRaw("CONCAT(pr.pseudonimo_nombre, ' ', pr.pseudonimo_apellido_paterno, ' ', pr.pseudonimo_apellido_materno) LIKE ?", ["%{$value}%"]);
            }),
            AllowedFilter::callback('pseudonimoNombre_reportante', function ($query, $value) {
                $query
                    ->where('pr.pseudonimo_nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('pseudonimoApellidoPaterno_reportante', function ($query, $value) {
                $query
                    ->where('pr.pseudonimo_apellido_paterno', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('pseudonimoApellidomaterno_reportante', function ($query, $value) {
                $query
                    ->where('pr.pseudonimo_apellido_materno', 'LIKE', ["%{$value}%"]);
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
                    ->where('c.id', 'like', "%{$value}%");
            }),
            AllowedFilter::callback('hipotesisOficial/circunstancia', function ($query, $value) {
                $query->join('tipos_hipotesis as th', 'reportes.hipotesis_oficial_id', '=', 'th.id')
                    ->join('circunstancias as c', 'th.circunstancia_id', '=', 'c.id')
                    ->where('c.descripcion', 'like', "%{$value}%");
            }),

            //Persona reportante
            AllowedFilter::callback('reportante/lugar_nacimiento_id', function ($query, $value) {
                $query->join('estados as e', 'pr.lugar_nacimiento_id', '=', 'e.id')
                    ->where('e.id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/lugar_nacimiento', function ($query, $value) {
                $query->join('estados as e', 'pr.lugar_nacimiento_id', '=', 'e.id')
                    ->where('e.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/fecha_nacimiento', function ($query, $value) {
                $query->where('pr.fecha_nacimiento', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/curp', function ($query, $value) {
                $query->where('pr.curp', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/rfc', function ($query, $value) {
                $query->where('pr.rfc', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/ocupacion', function ($query, $value) {
                $query->where('pr.ocupacion', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/nivel_escolaridad', function ($query, $value) {
                $query->where('pr.nivel_escolaridad', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/escolaridad_id', function ($query, $value) {
                $query->where('pr.escolaridad_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/escolaridad', function ($query, $value) {
                $query->join('escolaridades as e', 'pr.escolaridad_id', '=', 'e.id')
                    ->where('e.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/sexo_id', function ($query, $value) {
                $query->where('pr.sexo_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/sexo', function ($query, $value) {
                $query->join('sexos as sr', 'pr.sexo_id', '=', 'sr.id')
                    ->where('sr.sexo', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/genero_id', function ($query, $value) {
                $query->where('pr.genero_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/genero', function ($query, $value) {
                $query->join('generos as gr', 'pr.genero_id', '=', 'gr.id')
                    ->where('gr.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/apodo', function ($query, $value) {
                $query->join('apodos as ar', 'pr.id', '=', 'ar.persona_id')
                    ->whereRaw("CONCAT(a.nombre, ' ', a.apellido_paterno, ' ', a.apellido_materno) LIKE ?", ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/nacionalidad_id', function ($query, $value) {
                $query->join('nacionalidad_persona as npr', 'pr.id', '=', 'npr.persona_id')
                    ->where('pr.nacionalidad_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/nacionalidad', function ($query, $value) {
                $query->join('nacionalidad_persona as npr', 'pr.id', '=', 'npr.persona_id')
                    ->join('nacionalidades as n', 'np.nacionalidad_id', '=', 'n.id')
                    ->where('n.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/religion_id', function ($query, $value) {
                $query->where('pr.religion_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/religion', function ($query, $value) {
                $query->join('religiones as rer', 'pr.religion_id', '=', 'rer.id')
                    ->where('rer.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/lengua_id', function ($query, $value) {
                $query->where('pr.lengua_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/lengua', function ($query, $value) {
                $query->join('lenguas as lr', 'pr.lengua_id', '=', 'lr.id')
                    ->where('lr.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/telefono', function ($query, $value) {
                $query->join('telefonos as t', 'pr.id', '=', 't.persona_id')
                    ->where('t.numero', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/telefono/compania_id', function ($query, $value) {
                $query->join('telefonos as tc', 'pr.id', '=', 'tc.persona_id')
                    ->where('tc.compania_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/telefono/compania', function ($query, $value) {
                $query->join('telefonos as tc', 'pr.id', '=', 'tc.persona_id')
                    ->join('companias_telefonicas as ct', 'tc.compania_id', '=', 'ct.id')
                    ->where('ct.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/telefono/es_movil', function ($query, $value) {
                $query->join('telefonos as te', 'pr.id', '=', 'te.persona_id')
                    ->where('te.es_movil', 'LIKE', ["%{$value}%"]);
            }),

            //Reportante
            AllowedFilter::callback('reportante/parentesco_id', function ($query, $value) {
                $query->where('r.parentesco_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/parentesco', function ($query, $value) {
                $query->join('parentescos as pa', 'r.parentesco_id', '=', 'pa.id')
                    ->where('pa.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/colectivo_id', function ($query, $value) {
                $query->where('r.colectivo_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/colectivo', function ($query, $value) {
                $query->join('colectivos as co', 'r.parentesco_id', '=', 'co.id')
                    ->where('co.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/denuncia_anonima', function ($query, $value) {
                $query->where('r.denuncia_anonima', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('informacion_consentimiento', function ($query, $value) {
                $query->where('r.informacion_consentimiento', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('informacion_exclusiva_busqueda', function ($query, $value) {
                $query->where('r.informacion_exclusiva_busqueda', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('publicacion_registro_nacional', function ($query, $value) {
                $query->where('r.publicacion_registro_nacional', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('publicacion_boletin', function ($query, $value) {
                $query->where('r.publicacion_boletin', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/pertenencia_colectivo', function ($query, $value) {
                $query->where('r.pertenencia_colectivo', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('informacion_relevante', function ($query, $value) {
                $query->where('r.informacion_relevante', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('participacion_busqueda', function ($query, $value) {
                $query->where('r.partuicipacion_busqueda', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('descripcion_extorsion', function ($query, $value) {
                $query->where('r.descripcion_extorsion', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('descripcion_donde_proviene', function ($query, $value) {
                $query->where('r.descripcion_donde_proviene', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/edad_estimada', function ($query, $value) {
                $query->where('r.edad_estimada', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/estado_conyugal_id', function($query, $value) {
                $query->where('pr.estado_conyugal_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/estado_conyugal', function($query, $value) {
                $query->join('estados_conyugales as ec', 'pr.estado_conyugal_id', '=', 'ec.id')
                    ->where('ec.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('reportante/numero_personas_vive', function($query, $value) {
                $query->where('pr.numero_personas_vive', 'LIKE', ["%{$value}%"]);
            }),

            //Persona desaparecida
            AllowedFilter::callback('desaparecido/lugar_nacimiento_id', function ($query, $value) {
                $query->join('estados as e', 'p.lugar_nacimiento_id', '=', 'e.id')
                    ->where('e.id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/lugar_nacimiento', function ($query, $value) {
                $query->join('estados as e', 'p.lugar_nacimiento_id', '=', 'e.id')
                    ->where('e.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/fecha_nacimiento', function ($query, $value) {
                $query->where('p.fecha_nacimiento', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/curp', function ($query, $value) {
                $query->where('p.curp', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/rfc', function ($query, $value) {
                $query->where('p.rfc', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/ocupacion', function ($query, $value) {
                $query->where('p.ocupacion', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/nivel_escolaridad', function ($query, $value) {
                $query->where('p.nivel_escolaridad', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/escolaridad_id', function ($query, $value) {
                $query->where('p.escolaridad_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/escolaridad', function ($query, $value) {
                $query->join('escolaridades as es', 'p.escolaridad_id', '=', 'e.id')
                    ->where('e.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/sexo_id', function ($query, $value) {
                $query->where('p.sexo_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/sexo', function ($query, $value) {
                $query->join('sexos as s', 'p.sexo_id', '=', 's.id')
                    ->where('s.sexo', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/genero_id', function ($query, $value) {
                $query->where('p.genero_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/genero', function ($query, $value) {
                $query->join('generos as g', 'p.genero_id', '=', 'g.id')
                    ->where('g.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/apodo', function ($query, $value) {
                $query->join('apodos as a', 'p.id', '=', 'a.persona_id')
                    ->whereRaw("CONCAT(a.nombre, ' ', a.apellido_paterno, ' ', a.apellido_materno) LIKE ?", ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/nacionalidad_id', function ($query, $value) {
                $query->join('nacionalidad_persona as np', 'p.id', '=', 'np.persona_id')
                    ->where('p.nacionalidad_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/nacionalidad', function ($query, $value) {
                $query->join('nacionalidad_persona as np', 'p.id', '=', 'np.persona_id')
                    ->join('nacionalidades as n', 'np.nacionalidad_id', '=', 'n.id')
                    ->where('n.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/religion_id', function ($query, $value) {
                $query->where('p.religion_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/religion', function ($query, $value) {
                $query->join('religiones as re', 'p.religion_id', '=', 're.id')
                    ->where('re.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/lengua_id', function ($query, $value) {
                $query->where('p.lengua_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/lengua', function ($query, $value) {
                $query->join('lenguas as l', 'p.lengua_id', '=', 'l.id')
                    ->where('l.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/telefono', function ($query, $value) {
                $query->join('telefonos as td', 'p.id', '=', 'td.persona_id')
                    ->where('td.numero', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/telefono/compania_id', function ($query, $value) {
                $query->join('telefonos as tcd', 'p.id', '=', 'tcd.persona_id')
                    ->where('tcd.compania_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/telefono/compania', function ($query, $value) {
                $query->join('telefonos as tcd', 'p.id', '=', 'tcd.persona_id')
                    ->join('companias_telefonicas as ct', 'tcd.compania_id', '=', 'ct.id')
                    ->where('ct.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/telefono/es_movil', function ($query, $value) {
                $query->join('telefonos as ted', 'p.id', '=', 'ted.persona_id')
                    ->where('ted.es_movil', 'LIKE', ["%{$value}%"]);
            }),

            //Desaparecido
            AllowedFilter::callback('desaparecido/estatus_rpdno_id', function ($query, $value) {
                $query->where('d.estatus_rpdno_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/estatus_rpdno', function ($query, $value) {
                $query->join('estatus_personas as epr', 'd.estatus_rpdno_id', '=', 'epr.id')
                    ->where('epr.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/estatus_rpdno/abreviatura', function ($query, $value) {
                $query->join('estatus_personas as epr', 'd.estatus_rpdno_id', '=', 'epr.id')
                    ->where('epr.abreviatura', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/estatus_cebv_id', function ($query, $value) {
                $query->where('d.estatus_cebv_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/estatus_cebv', function ($query, $value) {
                $query->join('estatus_personas as ep', 'd.estatus_cebv_id', '=', 'ep.id')
                    ->where('ep.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/estatus_cebv/abreviatura', function ($query, $value) {
                $query->join('estatus_personas as epa', 'd.estatus_cebv_id', '=', 'epa.id')
                    ->where('epa.abreviatura', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/ocupacion_principal_id', function ($query, $value) {
                $query->where('d.ocupacion_principal_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/ocupacion_principal', function ($query, $value) {
                $query->join('ocupacion_principal as op', 'd.ocupacion_principal_id', '=', 'op.id')
                    ->join('ocupaciones as oc', 'op.ocupacion_id', '=', 'oc.id')
                    ->where('op.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/ocupacion_secundaria_id', function ($query, $value) {
                $query->where('d.ocupacion_secundaria_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/ocupacion_secundaria', function ($query, $value) {
                $query->join('ocupacion_secundaria as os', 'd.ocupacion_secundaria_id', '=', 'os.id')
                    ->join('ocupaciones as o', 'os.ocupacion_id', '=', 'o.id')
                    ->where('os.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/ocupacion_principal/tipo_ocupacion_id', function ($query, $value) {
                $query->join('ocupacion_principal as top', 'd.ocupacion_principal_id', '=', 'op.id')
                    ->join('ocupaciones as o', 'op.ocupacion_id', '=', 'o.id')
                    ->where('op.tipo_ocupacion_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/ocupacion_principal/tipo_ocupacion', function ($query, $value) {
                $query->join('ocupacion_principal as top', 'd.ocupacion_principal_id', '=', 'op.id')
                    ->join('ocupaciones as o', 'op.ocupacion_id', '=', 'o.id')
                    ->join('tipos_ocupacion as to', 'o.tipo_ocupacion_id', '=', 'to.id')
                    ->where('to.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/clasificacion_persona', function ($query, $value) {
                $query->where('d.clasificacion_persona', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/habla_espanhol', function ($query, $value) {
                $query->where('d.habla_espanhol', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/sabe_leer', function ($query, $value) {
                $query->where('d.sabe_leer', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/sabe_escribir', function ($query, $value) {
                $query->where('d.sabe_escribir', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/url_boletin', function ($query, $value) {
                $query->where('d.url_boletin', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/declaracion_especial_ausencia', function ($query, $value) {
                $query->where('d.declaracion_especial_ausencia', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/accion_urgente', function ($query, $value) {
                $query->where('d.accion_urgente', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/dictamen', function ($query, $value) {
                $query->where('d.dictamen', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/ci_nivel_federal', function ($query, $value) {
                $query->where('d.ci_nivel_federal', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/otro_derecho_humano', function ($query, $value) {
                $query->where('d.otro_derecho_humano', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/fecha_nacimiento_aproximada', function ($query, $value) {
                $query->where('d.fecha_nacimiento_aproximada', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/fecha_nacimiento_cebv', function ($query, $value) {
                $query->where('d.fecha_nacimiento_cebv', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/edad_momento_desaparicion/anos', function ($query, $value) {
                $query->where('d.edad_momento_desaparicion_anos', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/edad_momento_desaparicion/meses', function ($query, $value) {
                $query->where('d.edad_momento_desaparicion_meses', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/edad_momento_desaparicion/dias', function ($query, $value) {
                $query->where('d.edad_momento_desaparicion_dias', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/identidad_resguardada', function ($query, $value) {
                $query->where('d.identidad_resguardada', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/alias', function ($query, $value) {
                $query->where('d.alias', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/descripcion_ocupacion_principal', function ($query, $value) {
                $query->where('d.descripcion_ocupacion_principal', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/descripcion_ocupacion_secundaria', function ($query, $value) {
                $query->where('d.descripcion_ocupacion_secundaria', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/nombre_pareja_conyugue', function ($query, $value) {
                $query->where('d.nombre_pareja_conyugue', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/boletin_img_path', function ($query, $value) {
                $query->where('d.boletin_img_path', 'LIKE', ["%{$value}%"]);
            }),

            //Folios
            AllowedFilter::partial('folio_cebv', 'folios.folio_cebv'),
            AllowedFilter::partial('folio_fub', 'folios.folio_fub'),

            //Hechos desaparicion
            AllowedFilter::partial('hechoDesaparicion/direccion_id',
                'hechoDesaparicion.direccion_id'),
            AllowedFilter::partial('hechoDesaparicion/fecha_desaparicion',
                'hechoDesaparicion.fecha_desaparicion'),
            AllowedFilter::partial('hechoDesaparicion/fecha_desaparicion_aproximada',
                'hechoDesaparicion.fecha_desaparicion_aproximada'),
            AllowedFilter::partial('hechoDesaparicion/fecha_desaparicion_cebv',
                'hechoDesaparicion.fecha_desaparicion_cebv'),
            AllowedFilter::partial('hechoDesaparicion/hora_desaparicion',
                'hechoDesaparicion.hora_desaparicion'),
            AllowedFilter::partial('hechoDesaparicion/fecha_percato',
                'hechoDesaparicion.fecha_percato'),
            AllowedFilter::partial('hechoDesaparicion/fecha_percato_cebv',
                'hechoDesaparicion.fecha_percato_cebv'),
            AllowedFilter::partial('hechoDesaparicion/hora_percato',
                'hechoDesaparicion.hora_percato'),
            AllowedFilter::partial('hechoDesaparicion/aclaraciones_fecha_hechos',
                'hechoDesaparicion.aclaraciones_fecha_hechos'),
            AllowedFilter::partial('hechoDesaparicion/amenaza_cambio_comportamiento',
                'hechoDesaparicion.amenaza_cambio_comportamiento'),
            AllowedFilter::partial('hechoDesaparicion/descripcion/amenaza_cambio_comportamiento',
                'hechoDesaparicion.amenaza_cambio_comportamiento'),
            AllowedFilter::partial('hechoDesaparicion/contador_desapariciones',
                'hechoDesaparicion.contador_desapariciones'),
            AllowedFilter::partial('hechoDesaparicion/situacion_previa',
                'hechoDesaparicion.situacion_previa'),
            AllowedFilter::partial('hechoDesaparicion/informacion_relevante',
                'hechoDesaparicion.informacion_relevante'),
            AllowedFilter::partial('hechoDesaparicion/hechos_desaparicion',
                'hechoDesaparicion.hechos_desaparicion'),
            AllowedFilter::partial('hechoDesaparicion/sintesis_desaparicion',
                'hechoDesaparicion.sintesis_desaparicion'),
            AllowedFilter::partial('hechoDesaparicion/desaparecio_acompanado',
                'hechoDesaparicion.desaparecio_acompanado'),
            AllowedFilter::partial('hechoDesaparicion/personas_mismo_evento',
                'hechoDesaparicion.personas_mismo_evento'),

            //Señas particulares
            AllowedFilter::callback('desaparecido/senas_particulares_id', function ($query, $value) {
                $query->join('senas_particulares as sp', 'p.id', '=', 'sp.persona_id')
                    ->where('sp.id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/senas_particulares/region_cuerpo_id', function ($query, $value) {
                $query->join('senas_particulares as spr', 'p.id', '=', 'spr.persona_id')
                    ->where('spr.region_cuerpo_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/senas_particulares/region_cuerpo', function ($query, $value) {
                $query->join('senas_particulares as spr', 'p.id', '=', 'spr.persona_id')
                    ->join('region_cuerpo as rc', 'spr.region_cuerpo_id', '=', 'rc.id')
                    ->where('rc.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/senas_particulares/region_cuerpo/color', function ($query, $value) {
                $query->join('senas_particulares as sprc', 'p.id', '=', 'sprc.persona_id')
                    ->join('region_cuerpo as rc', 'sprc.region_cuerpo_id', '=', 'rc.id')
                    ->where('rc.color', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/senas_particulares/vista_id', function ($query, $value) {
                $query->join('senas_particulares as spv', 'p.id', '=', 'spv.persona_id')
                    ->where('spv.vista_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/senas_particulares/vista', function ($query, $value) {
                $query->join('senas_particulares as spv', 'p.id', '=', 'spv.persona_id')
                    ->join('vistas as v', 'spv.vista_id', '=', 'v.id')
                    ->where('v.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/senas_particulares/lado_id', function ($query, $value) {
                $query->join('senas_particulares as spl', 'p.id', '=', 'spl.persona_id')
                    ->where('spl.lado_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/senas_particulares/lado', function ($query, $value) {
                $query->join('senas_particulares as spl', 'p.id', '=', 'spl.persona_id')
                    ->join('lados as l', 'spl.lado_id', '=', 'l.id')
                    ->where('l.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/senas_particulares/lado/color', function ($query, $value) {
                $query->join('senas_particulares as splc', 'p.id', '=', 'splc.persona_id')
                    ->join('lados as l', 'splc.lado_id', '=', 'l.id')
                    ->where('l.color', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/senas_particulares/tipo_id', function ($query, $value) {
                $query->join('senas_particulares as spt', 'p.id', '=', 'spt.persona_id')
                    ->where('spt.tipo_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/senas_particulares/tipo', function ($query, $value) {
                $query->join('senas_particulares as spt', 'p.id', '=', 'spt.persona_id')
                    ->join('tipos as t', 'spt.tipo_id', '=', 't.id')
                    ->where('t.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/senas_particulares/cantidad', function ($query, $value) {
                $query->join('senas_particulares as spc', 'p.id', '=', 'spc.persona_id')
                    ->where('spc.cantidad', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/senas_particulares/descripcion', function ($query, $value) {
                $query->join('senas_particulares as spd', 'p.id', '=', 'spd.persona_id')
                    ->where('spd.descripcion', 'LIKE', ["%{$value}%"]);
            }),

            //Media filiacion
            AllowedFilter::callback('desaparecido/media_filiacion_id', function ($query, $value) {
                $query->join('medias_filiaciones as mf', 'p.id', '=', 'mf.persona_id')
                    ->where('mf.id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/estatura', function ($query, $value) {
                $query->join('medias_filiaciones as mfe', 'p.id', '=', 'mfe.persona_id')
                    ->where('mfe.estatura', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/peso', function ($query, $value) {
                $query->join('medias_filiaciones as mfp', 'p.id', '=', 'mfp.persona_id')
                    ->where('mfp.peso', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/complexion_id', function ($query, $value) {
                $query->join('medias_filiaciones as mfc', 'p.id', '=', 'mfc.persona_id')
                    ->where('mfc.complexion_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/complexion', function ($query, $value) {
                $query->join('medias_filiaciones as mfc', 'p.id', '=', 'mfc.persona_id')
                    ->join('complexiones as c', 'mfc.complexion_id', '=', 'c.id')
                    ->where('c.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/color_piel_id', function ($query, $value) {
                $query->join('medias_filiaciones as mfcp', 'p.id', '=', 'mfcp.persona_id')
                    ->where('mfcp.color_piel_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/color_piel', function ($query, $value) {
                $query->join('medias_filiaciones as mfcp', 'p.id', '=', 'mfcp.persona_id')
                    ->join('colores_pieles as cp', 'mfcp.color_piel_id', '=', 'cp.id')
                    ->where('cp.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/color_ojos_id', function ($query, $value) {
                $query->join('medias_filiaciones as mfco', 'p.id', '=', 'mfco.persona_id')
                    ->where('mf.color_ojos_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/color_ojos', function ($query, $value) {
                $query->join('medias_filiaciones as mfco', 'p.id', '=', 'mfco.persona_id')
                    ->join('colores_ojos as co', 'mfco.color_ojos_id', '=', 'co.id')
                    ->where('co.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/color_cabello_id', function ($query, $value) {
                $query->join('medias_filiaciones as mfcc', 'p.id', '=', 'mfcc.persona_id')
                    ->where('mfcc.color_cabello_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/color_cabello', function ($query, $value) {
                $query->join('medias_filiaciones as mfcc', 'p.id', '=', 'mfcc.persona_id')
                    ->join('colores_cabellos as cc', 'mfcc.color_cabello_id', '=', 'cc.id')
                    ->where('cc.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/tamano_cabello_id', function ($query, $value) {
                $query->join('medias_filiaciones as mf', 'p.id', '=', 'mftc.persona_id')
                    ->where('mf.tamano_cabello_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/tamano_cabello', function ($query, $value) {
                $query->join('medias_filiaciones as mftc', 'p.id', '=', 'mftc.persona_id')
                    ->join('tamanos_cabellos as tc', 'mftc.tamano_cabello_id', '=', 'tc.id')
                    ->where('tc.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/tipo_cabello_id', function ($query, $value) {
                $query->join('medias_filiaciones as mftca', 'p.id', '=', 'mftca.persona_id')
                    ->where('mftca.tipo_cabello_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('desaparecido/media_filiacion/tipo_cabello', function ($query, $value) {
                $query->join('medias_filiaciones as mftca', 'p.id', '=', 'mftca.persona_id')
                    ->join('tipo_cabellos as tc', 'mftca.tipo_cabello_id', '=', 'tc.id')
                    ->where('tc.nombre', 'LIKE', ["%{$value}%"]);
            }),

            //Vehiculos involucrados
            AllowedFilter::callback('vehiculos_involucrados/vehiculo_id', function ($query, $value) {
                $query->join('vehiculos as vi', 'reportes.id', '=', 'vi.reporte_id')
                    ->where('vi.id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/relacion_vehiculo_id', function ($query, $value) {
                $query->join('vehiculos as vir', 'reportes.id', '=', 'vir.reporte_id')
                    ->where('vir.relacion_vehiculo_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/relacion_vehiculo', function ($query, $value) {
                $query->join('vehiculos as vir', 'reportes.id', '=', 'vir.reporte_id')
                    ->join('relaciones_vehiculos as rv', 'vir.relacion_vehiculo_id', '=', 'rv.id')
                    ->where('rv.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/tipo_vehiculo_id', function ($query, $value) {
                $query->join('vehiculos as vit', 'reportes.id', '=', 'vit.reporte_id')
                    ->where('vit.tipo_vehiculo_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/tipo_vehiculo', function ($query, $value) {
                $query->join('vehiculos as vit', 'reportes.id', '=', 'vit.reporte_id')
                    ->join('tipos_vehiculos as tv', 'vit.tipo_vehiculo_id', '=', 'tv.id')
                    ->where('tv.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/uso_Vehiculo_id', function ($query, $value) {
                $query->join('vehiculos as viu', 'reportes.id', '=', 'viu.reporte_id')
                    ->where('viu.uso_vehiculo_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/uso_vehiculo', function ($query, $value) {
                $query->join('vehiculos as viu', 'reportes.id', '=', 'viu.reporte_id')
                    ->join('usos_vehiculos as uv', 'viu.uso_vehiculo_id', '=', 'uv.id')
                    ->where('uv.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/marca_vehiculo_id', function ($query, $value) {
                $query->join('vehiculos as vim', 'reportes.id', '=', 'vim.reporte_id')
                    ->where('vim.marca_vehiculo_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/marca_vehiculo', function ($query, $value) {
                $query->join('vehiculos as vim', 'reportes.id', '=', 'vim.reporte_id')
                    ->join('marcas_vehiculos as mv', 'vim.marca_vehiculo_id', '=', 'mv.id')
                    ->where('mv.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/color_id', function ($query, $value) {
                $query->join('vehiculos as vic', 'reportes.id', '=', 'vic.reporte_id')
                    ->where('vic.color_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/color', function ($query, $value) {
                $query->join('vehiculos as vic', 'reportes.id', '=', 'vic.reporte_id')
                    ->join('colores as c', 'vic.color_id', '=', 'c.id')
                    ->where('c.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/submarca' , function ($query, $value) {
                $query->join('vehiculos as vis', 'reportes.id', '=', 'vis.reporte_id')
                    ->where('vis.submarca', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/placa', function ($query, $value) {
                $query->join('vehiculos as vip', 'reportes.id', '=', 'vip.reporte_id')
                    ->where('vip.placa', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/modelo', function ($query, $value) {
                $query->join('vehiculos as vimo', 'reportes.id', '=', 'vimo.reporte_id')
                    ->where('vimo.modelo', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/numero_serie', function ($query, $value) {
                $query->join('vehiculos as vins', 'reportes.id', '=', 'vins.reporte_id')
                    ->where('vins.numero_serie', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/numero_motor', function ($query, $value) {
                $query->join('vehiculos as vin', 'reportes.id', '=', 'vin.reporte_id')
                    ->where('vin.numero_motor', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/numero_permiso', function ($query, $value) {
                $query->join('vehiculos as vinp', 'reportes.id', '=', 'vinp.reporte_id')
                    ->where('vinp.numero_permiso', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/descripcion', function ($query, $value) {
                $query->join('vehiculos as vid', 'reportes.id', '=', 'vid.reporte_id')
                    ->where('vid.numero_placa', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('vehiculos_involucrados/localizado', function ($query, $value) {
                $query->join('vehiculos as vil', 'reportes.id', '=', 'vil.reporte_id')
                    ->where('vil.localizado', 'LIKE', ["%{$value}%"]);
            }),

            //Prendas de vestir
            AllowedFilter::callback('prendas_vestir/prenda_id', function ($query, $value) {
                $query->join('prendas_vestir as pv', 'd.id', '=', 'pv.desaparecido_id')
                    ->where('pv.id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('prendas_vestir/pertenencia_id', function ($query, $value) {
                $query->join('prendas_vestir as pp', 'd.id', '=', 'pp.desaparecido_id')
                    ->where('pp.pertenencia_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('prendas_vestir/pertenencia', function ($query, $value) {
                $query->join('prendas_vestir as pp', 'd.id', '=', 'pp.desaparecido_id')
                    ->join('pertenencias as p', 'pp.pertenencia_id', '=', 'p.id')
                    ->where('p.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('prendas_vestir/grupo_pertenencia_id', function ($query, $value) {
                $query->join('prendas_vestir as pgp', 'd.id', '=', 'pgp.desaparecido_id')
                    ->join('pertenencias as pg', 'pgp.pertenencia_id', '=', 'pg.id')
                    ->where('pg.grupo_pertenencia_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('prendas_vestir/grupo_pertenencia', function ($query, $value) {
                $query->join('prendas_vestir as pgp', 'd.id', '=', 'pgp.desaparecido_id')
                    ->join('pertenencias as pg', 'pgp.pertenencia_id', '=', 'pg.id')
                    ->join('grupos_pertenencias as gp', 'pg.grupo_pertenencia_id', '=', 'gp.id')
                    ->where('gp.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('prendas_vestir/color_id', function ($query, $value) {
                $query->join('prendas_vestir as pc', 'd.id', '=', 'pc.desaparecido_id')
                    ->where('pc.color_id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('prendas_vestir/color', function ($query, $value) {
                $query->join('prendas_vestir as pc', 'd.id', '=', 'pc.desaparecido_id')
                    ->join('colores as c', 'pc.color_id', '=', 'c.id')
                    ->where('c.nombre', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('prendas_vestir/marca' , function ($query, $value) {
                $query->join('prendas_vestir as pm', 'd.id', '=', 'pm.desaparecido_id')
                    ->where('pm.marca', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('prendas_vestir/descripcion', function ($query, $value) {
                $query->join('prendas_vestir as pd', 'd.id', '=', 'pd.desaparecido_id')
                    ->where('pd.descripcion', 'LIKE', ["%{$value}%"]);
            }),

            //Documentos
            AllowedFilter::callback('documentos/documento_id', function ($query, $value) {
                $query->join('documentos as doc', 'd.id', '=', 'doc.desaparecido_id')
                    ->where('doc.id', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('documentos/tipo_documento', function ($query, $value) {
                $query->join('documentos as dot', 'd.id', '=', 'dot.desaparecido_id')
                    ->where('dot.tipo_documento', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('documentos/numero_documento', function ($query, $value) {
                $query->join('documentos as don', 'd.id', '=', 'don.desaparecido_id')
                    ->where('don.numero_documento', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('documentos/donde_radica', function ($query, $value) {
                $query->join('documentos as dod', 'd.id', '=', 'dod.desaparecido_id')
                    ->where('dod.donde_radica', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('documentos/nombre_servidor_publico', function ($query, $value) {
                $query->join('documentos as dons', 'd.id', '=', 'dons.desaparecido_id')
                    ->where('dons.nombre_servidor_publico', 'LIKE', ["%{$value}%"]);
            }),
            AllowedFilter::callback('documentos/fecha_recepcion', function ($query, $value) {
                $query->join('documentos as dof', 'd.id', '=', 'dof.desaparecido_id')
                    ->where('dof.fecha_recepcion', 'LIKE', ["%{$value}%"]);
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

        return $query;
    }
}
