<?php

namespace App\Http\Controllers\Oficialidades;

use App\Http\Controllers\Controller;
use App\Http\Requests\Oficialidades\AreaRequest;
use App\Http\Resources\Oficialidades\AreaResource;
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
        $query = $this->model::query();

        if (request()->has('search')) {
            $query = $this->model::search(request('search'));
        }

        return AreaResource::collection($query->get());
    }

    public function store(AreaRequest $request)
    {
        return $this->service->store($request, $this->model, new AreaResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new AreaResource($this->model::class));
    }

    public function update($id, AreaRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new AreaResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
