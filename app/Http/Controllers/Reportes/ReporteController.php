<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\ReporteRequest;
use App\Http\Resources\Reportes\ReporteResource;
use App\Models\Reportes\Reporte;

class ReporteController extends Controller
{
    public function index()
    {
        $query = Reporte::query();

        if (request()->has('search')) {
            $query = Reporte::search(request('search'));
        }

        // TODO: Volver a paginar esta query
        return ReporteResource::collection($query->paginate());
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
