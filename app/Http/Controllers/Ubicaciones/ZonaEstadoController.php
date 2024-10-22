<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ubicaciones\ZonaEstadoRequest;
use App\Http\Resources\BasicResource;
use App\Models\Ubicaciones\ZonaEstado;
use App\Services\CrudService;

class ZonaEstadoController extends Controller
{
    protected CrudService $service;
    protected ZonaEstado $model;

    public function __construct(CrudService $service, ZonaEstado $model)
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

        return BasicResource::collection($query->get());
    }

    public function store(ZonaEstadoRequest $request)
    {
        return $this->service->store($request, $this->model, new BasicResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new BasicResource($this->model::class));
    }

    public function update($id, ZonaEstadoRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new BasicResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
