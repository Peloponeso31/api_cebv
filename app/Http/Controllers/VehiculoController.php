<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiculoRequest;
use App\Http\Resources\VehiculoResource;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    public function index()
    {
        return VehiculoResource::collection(Vehiculo::all());
    }

    public function store(VehiculoRequest $request)
    {
        return new VehiculoResource(Vehiculo::create($request->validated()));
    }

    public function show(Vehiculo $vehiculo)
    {
        return new VehiculoResource($vehiculo);
    }

    public function update(VehiculoRequest $request, Vehiculo $vehiculo)
    {
        $vehiculo->update($request->validated());

        return new VehiculoResource($vehiculo);
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();

        return response()->json();
    }
}
