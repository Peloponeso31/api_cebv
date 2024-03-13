<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\ReporteRequest;
use App\Models\Reportes\Reporte;

class ReporteController extends Controller
{
    public function index()
    {
        $query = Reporte::query();

        if (request()->has('search')) {
            $query = Reporte::search(request('search'));
        }

        return $query->get();
    }

    public function store(ReporteRequest $request)
    {
        return Reporte::create($request->all());
    }

    public function show($id)
    {
        return Reporte::findOrFail($id);
    }

    public function update($id, ReporteRequest $request)
    {
        $reporte = Reporte::findOrFail($id);

        return $reporte->update($request->all());
    }

    public function destroy($id)
    {
        return Reporte::destroy($id);
    }
}
