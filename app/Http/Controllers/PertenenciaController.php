<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePertenenciaRequest;
use App\Http\Requests\UpdatePertenenciaRequest;
use App\Http\Resources\PertenenciaResource;
use App\Models\Pertenencia;
use Request;

class PertenenciaController extends Controller
{
    
    public function index()
    {
        return PertenenciaResource::collection(Pertenencia::all());
    }

    
    public function store(StorePertenenciaRequest $request)
    {
        return new PertenenciaResource(Pertenencia::create($request->all()));
    }

    
    public function show($id)
    {
        $model = Pertenencia::findOrFail($id);

        return new PertenenciaResource($model);
    }

    
    public function update($id, UpdatePertenenciaRequest $request)
    {
        $model = Pertenencia::findOrFail($id);

        $model->update($request->all());
    }

    
    public function destroy($id)
    {
            $model = Pertenencia::findOrFail($id);
            $model->delete();
            return response()->json(['message' => 'Deleted']);
    }
}
