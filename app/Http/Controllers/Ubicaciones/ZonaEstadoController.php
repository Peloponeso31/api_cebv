<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ubicaciones\ZonaEstadoRequest;
use App\Models\Ubicaciones\ZonaEstado;

class ZonaEstadoController extends Controller
{
    public function index()
    {
        return ZonaEstado::all();
    }

    public function store(ZonaEstadoRequest $request)
    {
        return ZonaEstado::create($request->validated());
    }

    public function show(ZonaEstado $zonaEstado)
    {
        return $zonaEstado;
    }

    public function update(ZonaEstadoRequest $request, ZonaEstado $zonaEstado)
    {
        $zonaEstado->update($request->validated());

        return $zonaEstado;
    }

    public function destroy(ZonaEstado $zonaEstado)
    {
        $zonaEstado->delete();

        return response()->json();
    }
}
