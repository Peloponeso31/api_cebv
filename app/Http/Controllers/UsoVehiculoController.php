<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsoVehiculoResource;
use App\Models\UsoVehiculo;
use Illuminate\Http\Request;

class UsoVehiculoController extends Controller
{
    public function index()
    {
        return UsoVehiculoResource::collection(UsoVehiculo::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new UsoVehiculoResource(UsoVehiculo::create($data));
    }

    public function show(UsoVehiculo $usoVehiculo)
    {
        return new UsoVehiculoResource($usoVehiculo);
    }

    public function update(Request $request, UsoVehiculo $usoVehiculo)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $usoVehiculo->update($data);

        return new UsoVehiculoResource($usoVehiculo);
    }

    public function destroy(UsoVehiculo $usoVehiculo)
    {
        $usoVehiculo->delete();

        return response()->json();
    }
}
