<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ReporteFilters {
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function applyFilter(Builder $query) {
        $this->estadoFilter($query);
        $this->tipoReporteFilter($query);
        $this->nombreDesaparecidoFilter($query);
        $this->nombreReportanteFilter($query);
        $this->terminadoFilter($query);
        $this->hipotesisOficialFilter($query);
        $this->areaAtiendeFilter($query);
        $this->estatusFilter($query);
        $this->folioFilter($query);
        $this->hechosDesaparicionFilter($query);
        $this->medioConocimientoFilter($query);
        $this->tipoDesaparicionFilter($query);
        $this->zonaEstadoFilter($query);

        return $query;
    }

    protected function estadoFilter(Builder $query) {
        if ($this->request->has('estado')) {
            $estado = $this->request->input('estado');
            $query->whereHas('estado', function($q) use($estado) {
                $q->where('nombre', 'like', '%' . $estado . '%');
            });
        }else if ($this->request->has('estado_id')) {
            $query->where('estado_id', $this->request->input('estado_id'));
        }
    }

    protected function tipoReporteFilter(Builder $query) {
        if ($this->request->has('tipo_reporte')) {
            $tipoReporte = $this->request->input('tipo_reporte');
            $query->whereHas('tipoReporte', function($q) use($tipoReporte) {
                $q->where('nombre', 'like', '%' . $tipoReporte . '%');
            });
        } else if ($this->request->has('tipo_reporte_id')) {
            $query->where('tipo_reporte_id', $this->request->input('tipo_reporte_id'));
        }
    }

    protected function medioConocimientoFilter(Builder $query)
    {
        if ($this->request->has('medio_conocimiento')) {
            $medioConocimiento = $this->request->input('medio_conocimiento');
            $query->whereHas('medioConocimiento', function($q) use($medioConocimiento) {
                $q->where('nombre', 'like', '%' . $medioConocimiento . '%');
            });
        }elseif ($this->request->has('medio_conocimiento_id')) {
            $query->where('medio_conocimiento_id', $this->request->input('medio_conocimiento_id'));
        }
    }

    protected function nombreDesaparecidoFilter(Builder $query) {
        //Filtro por nombre completo
        if ($this->request->has('nombreCompleto_desaparecido')) {
            $nombreCompletoDesaparecido = $this->request->input('nombreCompleto_desaparecido');

            $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                ->join('personas as p', 'd.persona_id', '=', 'p.id')
                ->where(DB::raw("CONCAT(p.nombre, ' ', p.apellido_paterno, ' ', p.apellido_materno)"),
                    'like', '%' . $nombreCompletoDesaparecido . '%')
                ->select('reportes.*');
        }

        //Filtro nombre por partes
        if ($this->request->has('nombre_desaparecido')) {
            $nombreDesaparecido = $this->request->input('nombre_desaparecido');

            $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                ->join('personas as p', 'd.persona_id', '=', 'p.id')
                ->where('p.nombre', 'like', '%' . $nombreDesaparecido . '%')
                ->select('reportes.*');
        }
        if ($this->request->has('apellidoPaterno_desaparecido')) {
            $apellidoMDesaparecido = $this->request->input('apellidoPaterno_desaparecido');

            $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                ->join('personas as p', 'd.persona_id', '=', 'p.id')
                ->where('p.apellido_paterno', 'like', '%' . $apellidoMDesaparecido . '%')
                ->select('reportes.*');
        }
        if ($this->request->has('apellidoMaterno_desaparecido')) {
            $apellidoMDesaparecido = $this->request->input('apellidoMaterno_desaparecido');

            $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                ->join('personas as p', 'd.persona_id', '=', 'p.id')
                ->where('p.apellido_materno', 'like', '%' . $apellidoMDesaparecido . '%')
                ->select('reportes.*');
        }

        //Filtro por pseudonimo completo
        if ($this->request->has('pseudonimoCompleto_desaparecido')) {
            $pseudonimoCompletoDesaparecido = $this->request->input('pseudonimoCompleto_desaparecido');

            $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                ->join('personas as p', 'd.persona_id', '=', 'p.id')
                ->where(DB::raw("CONCAT(p.pseudonimo_nombre, ' ', p.pseudonimo_apellido_paterno, '
                ', p.pseudonimo_apellido_materno)"), 'like', '%' . $pseudonimoCompletoDesaparecido . '%')
                ->select('reportes.*');
        }

        //Filtro pseudonimo por partes
        if ($this->request->has('pseudonimoNombre_desaparecido')) {
            $nombreDesaparecido = $this->request->input('pseudonimoMombre_desaparecido');

            $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                ->join('personas as p', 'd.persona_id', '=', 'p.id')
                ->where('p.pseudonimo_nombre', 'like', '%' . $nombreDesaparecido . '%')
                ->select('reportes.*');
        }
        if ($this->request->has('pseudonimoApellidoPaterno_desaparecido')) {
            $apellidoPDesaparecido = $this->request->input('pseudonimoApellidoPaterno_desaparecido');

            $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                ->join('personas as p', 'd.persona_id', '=', 'p.id')
                ->where('p.pseudonimo_apellido_paterno', 'like', '%' . $apellidoPDesaparecido . '%')
                ->select('reportes.*');
        }
        if ($this->request->has('pseudonimoApellidoMaterno_desaparecido')) {
            $apellidoMDesaparecido = $this->request->input('pseudonimoApellidoMaterno_desaparecido');

            $query->join('desaparecidos as d', 'reportes.id', '=', 'd.reporte_id')
                ->join('personas as p', 'd.persona_id', '=', 'p.id')
                ->where('p.pseudonimo_apellido_materno', 'like', '%' . $apellidoMDesaparecido . '%')
                ->select('reportes.*');
        }
    }

    protected function nombreReportanteFilter(Builder $query) {
        //Filtro por nombre completo
        if ($this->request->has('nombreCompleto_reportante')) {
            $nombreCompletoReportante = $this->request->input('nombreCompleto_reportante');

            $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                ->join('personas as p', 'r.persona_id', '=', 'p.id')
                ->where(DB::raw("CONCAT(p.nombre, ' ', p.apellido_paterno, ' ', p.apellido_materno)"),
                    'like', '%' . $nombreCompletoReportante . '%')
                ->select('reportes.*');
        }

        //Filtro nombre por partes
        if ($this->request->has('reportante')) {
            $nombreReportante = $this->request->input('reportante');

            $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                ->join('personas as p', 'r.persona_id', '=', 'p.id')
                ->where('p.nombre', 'like', '%' . $nombreReportante . '%')
                ->select('reportes.*');
        }
        if ($this->request->has('apellidoPaterno_reportante')) {
            $apellidoMDesaparecido = $this->request->input('apellidopaterno_reportante');

            $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                ->join('personas as p', 'r.persona_id', '=', 'p.id')
                ->where('p.apellido_paterno', 'like', '%' . $apellidoMDesaparecido . '%')
                ->select('reportes.*');
        }
        if ($this->request->has('apellidoMaterno_reportante')) {
            $apellidoMDesaparecido = $this->request->input('apellidoMaterno_reportante');

            $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                ->join('personas as p', 'r.persona_id', '=', 'p.id')
                ->where('p.apellido_materno', 'like', '%' . $apellidoMDesaparecido . '%')
                ->select('reportes.*');
        }

        //Filtro por pseudonimo completo
        if ($this->request->has('pseudonimoCompleto_reportante')) {
            $pseudonimoCompletoDesaparecido = $this->request->input('pseudonimoCompleto_reportante');

            $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                ->join('personas as p', 'r.persona_id', '=', 'p.id')
                ->where(DB::raw("CONCAT(p.pseudonimo_nombre, ' ', p.pseudonimo_apellido_paterno, '
                ', p.pseudonimo_apellido_materno)"), 'like', '%' . $pseudonimoCompletoDesaparecido . '%')
                ->select('reportes.*');
        }

        //Filtro pseudonimo por partes
        if ($this->request->has('pseudonimoNombre_reportante')) {
            $nombreDesaparecido = $this->request->input('pseudonimoNombre_reportante');

            $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                ->join('personas as p', 'r.persona_id', '=', 'p.id')
                ->where('p.pseudonimo_nombre', 'like', '%' . $nombreDesaparecido . '%')
                ->select('reportes.*');
        }
        if ($this->request->has('pseudonimoApellidoPaterno_reportante')) {
            $apellidoPDesaparecido = $this->request->input('pseudonimoApellidoPaterno_reportante');

            $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                ->join('personas as p', 'r.persona_id', '=', 'p.id')
                ->where('p.pseudonimo_apellido_paterno', 'like', '%' . $apellidoPDesaparecido . '%')
                ->select('reportes.*');
        }
        if ($this->request->has('pseudonimoApellidoMaterno_reportante')) {
            $apellidoMDesaparecido = $this->request->input('pseudonimoApellidoMaterno_reportante');

            $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                ->join('personas as p', 'r.persona_id', '=', 'p.id')
                ->where('p.pseudonimo_apellido_materno', 'like', '%' . $apellidoMDesaparecido . '%')
                ->select('reportes.*');
        }
    }

    protected function terminadoFilter(Builder $query) {
        if ($this->request->has('terminado')) {
            $query->where('esta_terminado', '=', $this->request->input('terminado'));
        }
    }

    protected function areaAtiendeFilter(Builder $query)
    {
        if ($this->request->has('area_atiende')) {
            $areaAtiende = $this->request->input('area_atiende');
            $query->whereHas('areAtiende', function($q) use($areaAtiende) {
                $q->where('nombre', 'like', '%' . $areaAtiende . '%');
            });
        } elseif ($this->request->has('area_atendido_id')) {
            $query->where('area_atendido_id', $this->request->input('area_atendido_id'));
        }
    }

    protected function zonaEstadoFilter(Builder $query)
    {
        if ($this->request->has('zona_estado')) {
            $zonaEstado = $this->request->input('zona_estado');
            $query->whereHas('zonaEstado', function($q) use($zonaEstado) {
                $q->where('nombre', 'like', '%' . $zonaEstado . '%');
            });
        } elseif ($this->request->has('zona_estado_id')) {
            $query->where('zona_estado_id', $this->request->input('zona_estado_id'));
        }
    }

    protected function hipotesisOficialFilter(Builder $query)
    {
        if ($this->request->has('hipotesis_oficial/descripcion')) {
            $hipotesisOficial = $this->request->input('hipotesis_oficial/descripcion');
            $query->whereHas('hipotesisOficial', function($q) use($hipotesisOficial) {
                $q->where('descripcion', 'like', '%' . $hipotesisOficial . '%');
            });
        }

        //Pendiente de termanar el filtrado por circunstancia tengo que agarrar señal
        if ($this->request->has('hipotesis_oficial/circunstancia')) {
            $hipotesisOficialCircunstancia = $this->request->input('hipotesis_oficial/circunstancia');
            $query->join('reportantes as r', 'reportes.id', '=', 'r.reporte_id')
                ->join('circunstancias as c', 'r.persona_id', '=', 'c.id')
                ->where('c.descripcion', 'like', '%' . $hipotesisOficialCircunstancia . '%')
                ->select('reportes.*');
        }
    }

    //Pendiente
    protected function estatusFilter(Builder $query)
    {
        if ($this->request->has('estatus_rpdno')) {}

        if ($this->request->has('estatus_cebv')) {}
    }

   protected function folioFilter(Builder $query)
   {
       if ($this->request->has('folio_cebv')) {
           $folio = $this->request->input('folio');
           $query->whereHas('folios', function($q) use($folio) {
               $q->where('folio_cebv', 'like', '%' . $folio . '%');
           });
       }

       if ($this->request->has('folio_fub')) {
           $folioFub = $this->request->input('folio_fub');
           $query->whereHas('folios', function($q) use($folioFub) {
               $q->where('folio_fub', 'like', '%' . $folioFub . '%');
           });
       }
   }

   protected function hechosDesaparicionFilter(Builder $query)
   {
       if ($this->request->has('hechos_desaparicion/fecha_desaparicion')) {
           $hechosDesaparicion = $this->request->input('hechos_desaparicion/fecha_desaparicion');
           $query->whereHas('hechoDesaparicion', function($q) use($hechosDesaparicion) {
               $q->where('fecha_desaparicion', 'like', '%' . $hechosDesaparicion . '%');
           });
       }

       if ($this->request->has('hechos_desaparicion/descripcion_amenaza')) {
           $hechosDesaparicionDescipcion = $this->request->input('hechos_desaparicion/descripcion_amenaza');
           $query->whereHas('hechoDesaparicion', function($q) use($hechosDesaparicionDescipcion) {
               $q->where('descripcion_amenaza', 'like', '%' . $hechosDesaparicionDescipcion . '%');
           });
       }

       if ($this->request->has('hechos_desaparicion/descripcion_cambio_comportamiento')) {
           $hechosDesaparicionDescipcion = $this->request->input('hechos_desaparicion/descripcion_cambio_comportamiento');
           $query->whereHas('hechoDesaparicion', function($q) use($hechosDesaparicionDescipcion) {
               $q->where('descripcion_cambio_comportamiento', 'like', '%' . $hechosDesaparicionDescipcion . '%');
           });
       }
   }

   protected function tipoDesaparicionFilter(Builder $query)
   {
       if ($this->request->has('tipo_desaparicion')) {
           $query->where('tipo_desaparicion', $this->request->input('tipo_desaparicion'));
       }
   }
}
