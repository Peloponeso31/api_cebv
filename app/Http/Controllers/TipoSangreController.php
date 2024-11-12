<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\TipoSangre;
use Illuminate\Http\Request;

class TipoSangreController extends Controller
{
    public function index()
    {
        $tipossangre = TipoSangre::withTipossangreCount()->orderBy('salud_count','desc')->get();

        return CatalogoResource::collection($tipossangre);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(TipoSangre::create($data));
    }

    public function show(TipoSangre $tipoSangre)
    {
        return new CatalogoResource($tipoSangre);
    }

    public function update(Request $request, TipoSangre $tipoSangre)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $tipoSangre->update($data);

        return new CatalogoResource($tipoSangre);
    }

    public function destroy(TipoSangre $tipoSangre)
    {
        $tipoSangre->delete();

        return response()->json();
    }
}
