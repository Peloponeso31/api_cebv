<?php

namespace App\Http\Controllers;

use App\Http\Resources\ColectivoResource;
use App\Models\Colectivo;
use Illuminate\Http\Request;

class ColectivoController extends Controller
{
    public function index()
    {
        return ColectivoResource::collection(Colectivo::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new ColectivoResource(Colectivo::create($data));
    }

    public function show(Colectivo $colectivo)
    {
        return new ColectivoResource($colectivo);
    }

    public function update(Request $request, Colectivo $colectivo)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $colectivo->update($data);

        return new ColectivoResource($colectivo);
    }

    public function destroy(Colectivo $colectivo)
    {
        $colectivo->delete();

        return response()->json();
    }
}
