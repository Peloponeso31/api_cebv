<?php

namespace App\Http\Controllers;

use App\Http\Resources\TipoSangreResource;
use App\Models\TipoSangre;
use Illuminate\Http\Request;

class TipoSangreController extends Controller
{
    public function index()
    {
        return TipoSangreResource::collection(TipoSangre::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new TipoSangreResource(TipoSangre::create($data));
    }

    public function show(TipoSangre $tipoSangre)
    {
        return new TipoSangreResource($tipoSangre);
    }

    public function update(Request $request, TipoSangre $tipoSangre)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $tipoSangre->update($data);

        return new TipoSangreResource($tipoSangre);
    }

    public function destroy(TipoSangre $tipoSangre)
    {
        $tipoSangre->delete();

        return response()->json();
    }
}
