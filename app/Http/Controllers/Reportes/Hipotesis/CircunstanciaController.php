<?php

namespace App\Http\Controllers\Reportes\Hipotesis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Hipotesis\CircunstanciaRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\Reportes\Hipotesis\Circunstancia;
use App\Services\CrudService;

class CircunstanciaController extends Controller
{
    protected CrudService $service;
    protected Circunstancia $model;

    public function __construct(CrudService $service, Circunstancia $model)
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

        return CatalogoResource::collection($query->get());
    }

    public function store(CircunstanciaRequest $request)
    {
        return $this->service->store($request, $this->model, new CatalogoResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new CatalogoResource($this->model::class));
    }

    public function update($id, CircunstanciaRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new CatalogoResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
