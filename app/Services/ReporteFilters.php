<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ReporteFilters {
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function applyFilter(Builder $query) {
        $this->estadoFilter($query);
        $this->tipoReporteFilter($query);
        $this->nombreDesaparecidoFilter($query);

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
            $estado = $this->request->input('tipo_reporte');
            $query->whereHas('tipo_reporte', function($q) use($estado) {
                $q->where('nombre', 'like', '%' . $estado . '%');
            });
        }else if ($this->request->has('tipo_reporte')) {
            $query->where('tipo_reporte_id', $this->request->input('tipo_reporte'));
        }
    }

    protected function nombreDesaparecidoFilter(Builder $query)
    {
        if ($this->request->has('nombre_desaparecido')) {
            $nombreDesaparecido = $this->request->input('nombre_desaparecido');
            $query->whereHas('desaparecidos', function($q) use($nombreDesaparecido) {
                $q->where('nombre', 'like', '%' . $nombreDesaparecido . '%');
            });
        }
    }
}
