<?php

namespace App\Http\Controllers\Informaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Informaciones\SitioRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\Informaciones\Sitio;
use App\Services\CrudService;

class SitioController extends Controller
{

    protected CrudService $service;
    protected Sitio $model;

    public function __construct(CrudService $service, Sitio $model)
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

        $query = $query->withSitiosCount()->orderBy('hechos_desaparicion_count','desc')->get();
        return CatalogoResource::collection($query);

    }

    public function store(SitioRequest $request)
    {
        return $this->service->store($request, $this->model, new CatalogoResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new CatalogoResource($this->model::class));
    }

    public function update($id, SitioRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new CatalogoResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
