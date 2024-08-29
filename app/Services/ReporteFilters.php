<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ReporteFilters {
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function appplyFilter(Builder $query) {
        $this->estadoFilter($query);
        $this->tipoReporteFilter($query);

        return $query;
    }

    protected function estadoFilter(Builder $query) {
        if ($this->request->has('estado')) {
            $query->where('estado_id', $this->request->input('estado'));
        }
    }

    protected function tipoReporteFilter(Builder $query) {
        if ($this->request->has('tipo_reporte')) {
            $query->where('tipo_reporte_id', $this->request->input('tipo_reporte'));
        }
    }


}
