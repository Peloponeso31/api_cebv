<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrupoPertenenciaRequest;
use App\Http\Requests\UpdateGrupoPertenenciaRequest;
use App\Http\Resources\GrupoPertenenciaResource;
use App\Models\GrupoPertenencia;
use Request;

class GrupoPertenenciaController extends Controller
{
    
    public function index()
    {
        return GrupoPertenenciaResource::collection(GrupoPertenencia::all());
    }

    
    public function store(StoreGrupoPertenenciaRequest $request)
    {
        return new GrupoPertenenciaResource(GrupoPertenencia::create($request->all()));
    }

    
    public function show($id)
    {
        $model = GrupoPertenencia::findOrFail($id);

        return new GrupoPertenenciaResource($model);
    }

    
    public function update($id, UpdateGrupoPertenenciaRequest $request)
    {
        $model = GrupoPertenencia::findOrFail($id);

        $model->update($request->all());
    }

    
    public function destroy($id)
    {
            $model = GrupoPertenencia::findOrFail($id);
            $model->delete();
            return response()->json(['message' => 'Deleted']);
    }
}
