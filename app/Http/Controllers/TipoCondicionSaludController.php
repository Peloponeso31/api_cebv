<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoCondicionSaludRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\TipoCondicionSalud;

class TipoCondicionSaludController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(TipoCondicionSalud::all());
    }

    public function store(TipoCondicionSaludRequest $request)
    {
        return new CatalogoResource(TipoCondicionSalud::create($request->validated()));
    }

    public function show(TipoCondicionSalud $tipoCondicionSalud)
    {
        return new CatalogoResource($tipoCondicionSalud);
    }

    public function update(TipoCondicionSaludRequest $request, TipoCondicionSalud $tipoCondicionSalud)
    {
        $tipoCondicionSalud->update($request->validated());

        return new CatalogoResource($tipoCondicionSalud);
    }

    public function destroy(TipoCondicionSalud $tipoCondicionSalud)
    {
        $tipoCondicionSalud->delete();

        return response()->json();
    }
}
