<?php

namespace App\Http\Controllers\Reportes\Relaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Relaciones\ReportanteRequest;
use App\Http\Resources\Reportes\Relaciones\ReportanteResource;
use App\Models\Reportes\Relaciones\Reportante;
use App\Services\CrudService;

class ReportanteController extends Controller
{
    protected CrudService $service;
    protected Reportante $model;

    public function __construct(CrudService $service, Reportante $model)
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

        return ReportanteResource::collection($query->get());
    }

    public function store(ReportanteRequest $request)
    {
        return $this->service->store($request, $this->model, new ReportanteResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new ReportanteResource($this->model::class));
    }

    public function update($id, ReportanteRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new ReportanteResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
