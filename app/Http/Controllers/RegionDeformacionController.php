<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegionDeformacionResource;
use App\Models\RegionDeformacion;
use Illuminate\Http\Request;

class RegionDeformacionController extends Controller
{
    public function index()
    {
        return RegionDeformacionResource::collection(RegionDeformacion::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new RegionDeformacionResource(RegionDeformacion::create($data));
    }

    public function show(RegionDeformacion $regionDeformacion)
    {
        return new RegionDeformacionResource($regionDeformacion);
    }

    public function update(Request $request, RegionDeformacion $regionDeformacion)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $regionDeformacion->update($data);

        return new RegionDeformacionResource($regionDeformacion);
    }

    public function destroy(RegionDeformacion $regionDeformacion)
    {
        $regionDeformacion->delete();

        return response()->json();
    }
}
