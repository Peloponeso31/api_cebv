<?php

namespace App\Http\Controllers;

use App\Http\Resources\TipoRedSocialResource;
use App\Models\TipoRedSocial;
use Illuminate\Http\Request;

class TipoRedSocialController extends Controller
{
    public function index()
    {
        return TipoRedSocialResource::collection(TipoRedSocial::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new TipoRedSocialResource(TipoRedSocial::create($data));
    }

    public function show(TipoRedSocial $tipoRedSocial)
    {
        return new TipoRedSocialResource($tipoRedSocial);
    }

    public function update(Request $request, TipoRedSocial $tipoRedSocial)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $tipoRedSocial->update($data);

        return new TipoRedSocialResource($tipoRedSocial);
    }

    public function destroy(TipoRedSocial $tipoRedSocial)
    {
        $tipoRedSocial->delete();

        return response()->json();
    }
}
