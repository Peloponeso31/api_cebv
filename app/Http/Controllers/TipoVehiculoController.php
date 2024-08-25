<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\TipoVehiculo;
use Illuminate\Http\Request;

class TipoVehiculoController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(TipoVehiculo::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(TipoVehiculo::create($data));
    }

    public function show(TipoVehiculo $tipoVehiculo)
    {
        return new CatalogoResource($tipoVehiculo);
    }

    public function update(Request $request, TipoVehiculo $tipoVehiculo)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $tipoVehiculo->update($data);

        return new CatalogoResource($tipoVehiculo);
    }

    public function destroy(TipoVehiculo $tipoVehiculo)
    {
        $tipoVehiculo->delete();

        return response()->json();
    }
}
