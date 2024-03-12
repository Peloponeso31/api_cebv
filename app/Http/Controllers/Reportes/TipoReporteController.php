<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\TipoReporteRequest;
use App\Models\Reportes\TipoReporte;

class TipoReporteController extends Controller
{
    public function index()
    {
        $query = TipoReporte::query();

        if (request()->has('search')) {
            $query = TipoReporte::search(request('search'));
        }

        return $query->get();
    }

    public function store(TipoReporteRequest $request)
    {
        return TipoReporte::create($request->all());
    }

    public function show($id)
    {
        return TipoReporte::findOrFail($id);
    }

    public function update($id, TipoReporteRequest $request)
    {
        $tipoReporte = TipoReporte::findOrFail($id);

        return $tipoReporte->update($request->all());
    }

    public function destroy($id)
    {
        return TipoReporte::destroy($id);
    }
}
