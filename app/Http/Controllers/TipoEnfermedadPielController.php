<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoEnfermedadPielRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\TipoEnfermedadPiel;

class TipoEnfermedadPielController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(TipoEnfermedadPiel::all());
    }

    public function store(TipoEnfermedadPielRequest $request)
    {
        return new CatalogoResource(TipoEnfermedadPiel::create($request->validated()));
    }

    public function show(TipoEnfermedadPiel $tipoEnfermedadPiel)
    {
        return new CatalogoResource($tipoEnfermedadPiel);
    }

    public function update(TipoEnfermedadPielRequest $request, TipoEnfermedadPiel $tipoEnfermedadPiel)
    {
        $tipoEnfermedadPiel->update($request->validated());

        return new CatalogoResource($tipoEnfermedadPiel);
    }

    public function destroy(TipoEnfermedadPiel $tipoEnfermedadPiel)
    {
        $tipoEnfermedadPiel->delete();

        return response()->json();
    }
}
