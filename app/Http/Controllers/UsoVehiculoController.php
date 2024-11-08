<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\UsoVehiculo;
use Illuminate\Http\Request;

class UsoVehiculoController extends Controller
{
    public function index()
    {
        $usosvehiculos = UsoVehiculo::withUsosvehiculosCount()->orderBy('vehiculos_count','desc')->get();

        return CatalogoResource::collection($usosvehiculos);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(UsoVehiculo::create($data));
    }

    public function show(UsoVehiculo $usoVehiculo)
    {
        return new CatalogoResource($usoVehiculo);
    }

    public function update(Request $request, UsoVehiculo $usoVehiculo)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $usoVehiculo->update($data);

        return new CatalogoResource($usoVehiculo);
    }

    public function destroy(UsoVehiculo $usoVehiculo)
    {
        $usoVehiculo->delete();

        return response()->json();
    }
}
