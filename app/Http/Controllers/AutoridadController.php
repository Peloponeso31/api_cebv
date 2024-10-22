<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\Autoridad;
use Illuminate\Http\Request;

class AutoridadController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(Autoridad::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(Autoridad::create($data));
    }

    public function show(Autoridad $autoridad)
    {
        return new CatalogoResource($autoridad);
    }

    public function update(Request $request, Autoridad $autoridad)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $autoridad->update($data);

        return new CatalogoResource($autoridad);
    }

    public function destroy(Autoridad $autoridad)
    {
        $autoridad->delete();

        return response()->json();
    }
}
