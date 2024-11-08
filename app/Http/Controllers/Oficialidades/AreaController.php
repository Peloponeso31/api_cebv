<?php

namespace App\Http\Controllers\Oficialidades;

use App\Http\Controllers\Controller;
use App\Http\Requests\Oficialidades\AreaRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\Oficialidades\Area;
use App\Services\CrudService;

class AreaController extends Controller
{
    protected CrudService $service;
    protected Area $model;

    public function __construct(CrudService $service, Area $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    public function index()
    {

        $areas = Area::withAreasCount()->orderBy('reportes_count','desc')->get();

        if (request()->has('all')) {
            return CatalogoResource::collection($areas);
        }

        return CatalogoResource::collection($areas->except(5));
    }

    public function store(AreaRequest $request)
    {
        return $this->service->store($request, $this->model, new CatalogoResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new CatalogoResource($this->model::class));
    }

    public function update($id, AreaRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new CatalogoResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
