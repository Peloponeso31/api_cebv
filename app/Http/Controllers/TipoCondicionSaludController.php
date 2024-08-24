<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoCondicionSaludRequest;
use App\Http\Resources\TipoCondicionSaludResource;
use App\Models\TipoCondicionSalud;

class TipoCondicionSaludController extends Controller
{
    public function index()
    {
        return TipoCondicionSaludResource::collection(TipoCondicionSalud::all());
    }

    public function store(TipoCondicionSaludRequest $request)
    {
        return new TipoCondicionSaludResource(TipoCondicionSalud::create($request->validated()));
    }

    public function show(TipoCondicionSalud $tipoCondicionSalud)
    {
        return new TipoCondicionSaludResource($tipoCondicionSalud);
    }

    public function update(TipoCondicionSaludRequest $request, TipoCondicionSalud $tipoCondicionSalud)
    {
        $tipoCondicionSalud->update($request->validated());

        return new TipoCondicionSaludResource($tipoCondicionSalud);
    }

    public function destroy(TipoCondicionSalud $tipoCondicionSalud)
    {
        $tipoCondicionSalud->delete();

        return response()->json();
    }
}
