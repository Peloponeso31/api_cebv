<?php

namespace App\Http\Controllers;

use App\Http\Resources\TipoMentonResource;
use App\Models\TipoMenton;
use Illuminate\Http\Request;

class TipoMentonController extends Controller
{
    public function index()
    {
        return TipoMentonResource::collection(TipoMenton::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new TipoMentonResource(TipoMenton::create($data));
    }

    public function show(TipoMenton $tipoMenton)
    {
        return new TipoMentonResource($tipoMenton);
    }

    public function update(Request $request, TipoMenton $tipoMenton)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $tipoMenton->update($data);

        return new TipoMentonResource($tipoMenton);
    }

    public function destroy(TipoMenton $tipoMenton)
    {
        $tipoMenton->delete();

        return response()->json();
    }
}
