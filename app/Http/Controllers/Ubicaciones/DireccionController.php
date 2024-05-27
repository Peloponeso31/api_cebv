<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ubicaciones\DireccionRequest;
use App\Http\Resources\Ubicaciones\DireccionResource;
use App\Models\Ubicaciones\Direccion;
use App\Services\CrudService;

class DireccionController extends Controller
{
    protected CrudService $service;
    protected Direccion $model;

    public function __construct(CrudService $service, Direccion $model)
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

        return DireccionResource::collection($query->get());
    }

    public function store(DireccionRequest $request)
    {
        return $this->service->store($request, $this->model, new DireccionResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new DireccionResource($this->model::class));
    }

    public function update($id, DireccionRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new DireccionResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
