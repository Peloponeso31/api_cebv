<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\Colectivo;
use Illuminate\Http\Request;

class ColectivoController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(Colectivo::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(Colectivo::create($data));
    }

    public function show(Colectivo $colectivo)
    {
        return new CatalogoResource($colectivo);
    }

    public function update(Request $request, Colectivo $colectivo)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $colectivo->update($data);

        return new CatalogoResource($colectivo);
    }

    public function destroy(Colectivo $colectivo)
    {
        $colectivo->delete();

        return response()->json();
    }
}
