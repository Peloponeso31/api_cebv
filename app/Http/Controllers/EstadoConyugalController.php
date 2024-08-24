<?php

namespace App\Http\Controllers;

use App\Http\Resources\EstadoConyugalResource;
use App\Models\EstadoConyugal;
use Illuminate\Http\Request;

class EstadoConyugalController extends Controller
{
    public function index()
    {
        return EstadoConyugalResource::collection(EstadoConyugal::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new EstadoConyugalResource(EstadoConyugal::create($data));
    }

    public function show(EstadoConyugal $estadoConyugal)
    {
        return new EstadoConyugalResource($estadoConyugal);
    }

    public function update(Request $request, EstadoConyugal $estadoConyugal)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $estadoConyugal->update($data);

        return new EstadoConyugalResource($estadoConyugal);
    }

    public function destroy(EstadoConyugal $estadoConyugal)
    {
        $estadoConyugal->delete();

        return response()->json();
    }
}
