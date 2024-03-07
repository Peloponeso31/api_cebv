<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\TipoReporteRequest;
use App\Models\Reportes\TipoReporte;

class TipoReporteController extends Controller
{
    public function index()
    {
        return TipoReporte::all();
    }

    public function store(TipoReporteRequest $request)
    {
        return TipoReporte::create($request->validated());
    }

    public function show(TipoReporte $tipoReporte)
    {
        return $tipoReporte;
    }

    public function update(TipoReporteRequest $request, TipoReporte $tipoReporte)
    {
        $tipoReporte->update($request->validated());

        return $tipoReporte;
    }

    public function destroy(TipoReporte $tipoReporte)
    {
        $tipoReporte->delete();

        return response()->json();
    }
}
