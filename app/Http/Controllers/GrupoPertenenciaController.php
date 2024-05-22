<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrupoPertenenciaRequest;
use App\Http\Requests\UpdateGrupoPertenenciaRequest;
use App\Http\Resources\GrupoPertenenciaResource;
use App\Models\GrupoPertenencia;
use App\Services\CrudService;
use Request;

class GrupoPertenenciaController extends Controller
{
    protected CrudService $service;
    protected GrupoPertenencia $model;

    public function __construct(CrudService $service, GrupoPertenencia $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    public function index()
    {
        $query = $this->model::query();

        if (request()->has('search')) {
            $query = $this->model::search(request('search'));
        }

        return GrupoPertenenciaResource::collection($query->get());
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
