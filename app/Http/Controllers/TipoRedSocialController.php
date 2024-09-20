<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\TipoRedSocial;
use Illuminate\Http\Request;

class TipoRedSocialController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(TipoRedSocial::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(TipoRedSocial::create($data));
    }

    public function show(TipoRedSocial $tipoRedSocial)
    {
        return new CatalogoResource($tipoRedSocial);
    }

    public function update(Request $request, TipoRedSocial $tipoRedSocial)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $tipoRedSocial->update($data);

        return new CatalogoResource($tipoRedSocial);
    }

    public function destroy(TipoRedSocial $tipoRedSocial)
    {
        $tipoRedSocial->delete();

        return response()->json();
    }
}
