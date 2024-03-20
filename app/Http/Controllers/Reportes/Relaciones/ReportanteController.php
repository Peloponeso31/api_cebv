<?php

namespace App\Http\Controllers\Reportes\Relaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\ReportanteRequest;
use App\Models\Reportes\Relaciones\Reportante;

class ReportanteController extends Controller
{
    public function index()
    {
        return Reportante::all();
    }

    public function store(ReportanteRequest $request)
    {
        return Reportante::create($request->validated());
    }

    public function show(Reportante $reportante)
    {
        return $reportante;
    }

    public function update(ReportanteRequest $request, Reportante $reportante)
    {
        $reportante->update($request->validated());

        return $reportante;
    }

    public function destroy(Reportante $reportante)
    {
        $reportante->delete();

        return response()->json();
    }
}
