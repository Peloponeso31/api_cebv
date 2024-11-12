<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoEnfoqueDiferenciadoRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\TipoEnfoqueDiferenciado;

class TipoEnfoqueDiferenciadoController extends Controller
{
    public function index()
    {
        $tiposenfoquesdif = TipoEnfoqueDiferenciado::withTiposenfoquesdif()->orderBy('personas_count','desc')->get();
        return CatalogoResource::collection($tiposenfoquesdif);
    }

    public function store(TipoEnfoqueDiferenciadoRequest $request)
    {
        return new CatalogoResource(TipoEnfoqueDiferenciado::create($request->validated()));
    }

    public function show(TipoEnfoqueDiferenciado $tipoEnfoqueDiferenciado)
    {
        return new CatalogoResource($tipoEnfoqueDiferenciado);
    }

    public function update(TipoEnfoqueDiferenciadoRequest $request, TipoEnfoqueDiferenciado $tipoEnfoqueDiferenciado)
    {
        $tipoEnfoqueDiferenciado->update($request->validated());

        return new CatalogoResource($tipoEnfoqueDiferenciado);
    }

    public function destroy(TipoEnfoqueDiferenciado $tipoEnfoqueDiferenciado)
    {
        $tipoEnfoqueDiferenciado->delete();

        return response()->json();
    }
}
