<?php

namespace App\Http\Controllers\CondicionVulnerabilidad;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCondicionVulnerabilidadRequest;
use App\Http\Requests\UpdateCondicionVulnerabilidadRequest;
use App\Http\Resources\CondicionVulnerabilidad\CondicionVulnerabilidadResource;
use App\Models\CondicionVulnerabilidad\CondicionVulnerabilidad;

class CondicionVulnerabilidadController extends Controller
{
    
    public function index()
    {
        return CondicionVulnerabilidadResource::collection(CondicionVulnerabilidad::all());
    }
    
    public function store(StoreCondicionVulnerabilidadRequest $request)
    {
        return new CondicionVulnerabilidadResource(CondicionVulnerabilidad::create($request->all()));
    }

    
    public function show($id)
    {
        $model = CondicionVulnerabilidad::findOrFail($id);

        return new CondicionVulnerabilidadResource($model);
    }


    public function update($id, UpdateCondicionVulnerabilidadRequest $request)
    {
        $model = CondicionVulnerabilidad::findOrFail($id);

        $model->update($request->all());
    }

    
    public function destroy($id)
    {
            $model = CondicionVulnerabilidad::findOrFail($id);
            $model->delete();
            return response()->json(['message' => 'Deleted']);
    }
}
