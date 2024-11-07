<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\TipoMenton;
use Illuminate\Http\Request;

class TipoMentonController extends Controller
{
    public function index()
    {
        $tiposmentones = TipoMenton::withTiposmentonesCount()->orderBy('medias_filiaciones_complementarias_count','desc')->get();
        return CatalogoResource::collection($tiposmentones);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(TipoMenton::create($data));
    }

    public function show(TipoMenton $tipoMenton)
    {
        return new CatalogoResource($tipoMenton);
    }

    public function update(Request $request, TipoMenton $tipoMenton)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $tipoMenton->update($data);

        return new CatalogoResource($tipoMenton);
    }

    public function destroy(TipoMenton $tipoMenton)
    {
        $tipoMenton->delete();

        return response()->json();
    }
}
