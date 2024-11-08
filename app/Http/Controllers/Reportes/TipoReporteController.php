<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\TipoReporteRequest;
use App\Http\Resources\BasicResource;
use App\Models\Reportes\TipoReporte;
use App\Services\CrudService;

class TipoReporteController extends Controller
{
    protected CrudService $service;
    protected TipoReporte $model;

    public function __construct(CrudService $service, TipoReporte $model)
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

        $query = $query->withCount('reportes')->orderBy('reportes_count', 'desc')->get();
        return BasicResource::collection($query);

    }

    public function store(TipoReporteRequest $request)
    {
        return $this->service->store($request, $this->model, new BasicResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new BasicResource($this->model::class));
    }

    public function update($id, TipoReporteRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new BasicResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
