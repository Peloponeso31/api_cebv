<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePertenenciaRequest;
use App\Http\Requests\UpdatePertenenciaRequest;
use App\Http\Resources\PertenenciaResource;
use App\Models\Pertenencia;
use App\Services\CrudService;
use Request;

class PertenenciaController extends Controller
{
    protected CrudService $service;
    protected Pertenencia $model;

    public function __construct(CrudService $service, Pertenencia $model)
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

        return PertenenciaResource::collection($query->get());
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
