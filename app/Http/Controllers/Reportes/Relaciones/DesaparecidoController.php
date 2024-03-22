<?php

namespace App\Http\Controllers\Reportes\Relaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Relaciones\DesaparecidoRequest;
use App\Http\Resources\Reportes\Relaciones\DesaparecidoResource;
use App\Models\Reportes\Relaciones\Desaparecido;

class DesaparecidoController extends Controller
{
    public function index()
    {
        return DesaparecidoResource::collection(Desaparecido::all());
    }

    public function store(DesaparecidoRequest $request)
    {
        return new DesaparecidoResource(Desaparecido::create($request->validated()));
    }

    public function show(Desaparecido $desaparecido)
    {
        return new DesaparecidoResource($desaparecido);
    }

    public function update(DesaparecidoRequest $request, Desaparecido $desaparecido)
    {
        $desaparecido->update($request->validated());

        return new DesaparecidoResource($desaparecido);
    }

    public function destroy(Desaparecido $desaparecido)
    {
        $desaparecido->delete();

        return response()->json();
    }
}
