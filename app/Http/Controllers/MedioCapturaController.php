<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\MedioCaptura;
use Illuminate\Http\Request;

class MedioCapturaController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(MedioCaptura::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(MedioCaptura::create($data));
    }

    public function show(MedioCaptura $medioCaptura)
    {
        return new CatalogoResource($medioCaptura);
    }

    public function update(Request $request, MedioCaptura $medioCaptura)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $medioCaptura->update($data);

        return new CatalogoResource($medioCaptura);
    }

    public function destroy(MedioCaptura $medioCaptura)
    {
        $medioCaptura->delete();

        return response()->json();
    }
}
