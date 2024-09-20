<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\MarcaVehiculo;
use Illuminate\Http\Request;

class MarcaVehiculoController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(MarcaVehiculo::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(MarcaVehiculo::create($data));
    }

    public function show(MarcaVehiculo $marcaVehiculo)
    {
        return new CatalogoResource($marcaVehiculo);
    }

    public function update(Request $request, MarcaVehiculo $marcaVehiculo)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $marcaVehiculo->update($data);

        return new CatalogoResource($marcaVehiculo);
    }

    public function destroy(MarcaVehiculo $marcaVehiculo)
    {
        $marcaVehiculo->delete();

        return response()->json();
    }
}
