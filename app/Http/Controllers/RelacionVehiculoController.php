<?php

namespace App\Http\Controllers;

use App\Http\Resources\RelacionVehiculoResource;
use App\Models\RelacionVehiculo;
use Illuminate\Http\Request;

class RelacionVehiculoController extends Controller
{
    public function index()
    {
        return RelacionVehiculoResource::collection(RelacionVehiculo::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new RelacionVehiculoResource(RelacionVehiculo::create($data));
    }

    public function show(RelacionVehiculo $relacionVehiculo)
    {
        return new RelacionVehiculoResource($relacionVehiculo);
    }

    public function update(Request $request, RelacionVehiculo $relacionVehiculo)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $relacionVehiculo->update($data);

        return new RelacionVehiculoResource($relacionVehiculo);
    }

    public function destroy(RelacionVehiculo $relacionVehiculo)
    {
        $relacionVehiculo->delete();

        return response()->json();
    }
}
