<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoEnfermedadPielRequest;
use App\Http\Resources\TipoEnfermedadPielResource;
use App\Models\TipoEnfermedadPiel;

class TipoEnfermedadPielController extends Controller
{
    public function index()
    {
        return TipoEnfermedadPielResource::collection(TipoEnfermedadPiel::all());
    }

    public function store(TipoEnfermedadPielRequest $request)
    {
        return new TipoEnfermedadPielResource(TipoEnfermedadPiel::create($request->validated()));
    }

    public function show(TipoEnfermedadPiel $tipoEnfermedadPiel)
    {
        return new TipoEnfermedadPielResource($tipoEnfermedadPiel);
    }

    public function update(TipoEnfermedadPielRequest $request, TipoEnfermedadPiel $tipoEnfermedadPiel)
    {
        $tipoEnfermedadPiel->update($request->validated());

        return new TipoEnfermedadPielResource($tipoEnfermedadPiel);
    }

    public function destroy(TipoEnfermedadPiel $tipoEnfermedadPiel)
    {
        $tipoEnfermedadPiel->delete();

        return response()->json();
    }
}
