<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoEnfoqueDiferenciadoRequest;
use App\Http\Resources\TipoEnfoqueDiferenciadoResource;
use App\Models\TipoEnfoqueDiferenciado;

class TipoEnfoqueDiferenciadoController extends Controller
{
    public function index()
    {
        return TipoEnfoqueDiferenciadoResource::collection(TipoEnfoqueDiferenciado::all());
    }

    public function store(TipoEnfoqueDiferenciadoRequest $request)
    {
        return new TipoEnfoqueDiferenciadoResource(TipoEnfoqueDiferenciado::create($request->validated()));
    }

    public function show(TipoEnfoqueDiferenciado $tipoEnfoqueDiferenciado)
    {
        return new TipoEnfoqueDiferenciadoResource($tipoEnfoqueDiferenciado);
    }

    public function update(TipoEnfoqueDiferenciadoRequest $request, TipoEnfoqueDiferenciado $tipoEnfoqueDiferenciado)
    {
        $tipoEnfoqueDiferenciado->update($request->validated());

        return new TipoEnfoqueDiferenciadoResource($tipoEnfoqueDiferenciado);
    }

    public function destroy(TipoEnfoqueDiferenciado $tipoEnfoqueDiferenciado)
    {
        $tipoEnfoqueDiferenciado->delete();

        return response()->json();
    }
}
