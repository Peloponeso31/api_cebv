<?php

namespace App\Http\Controllers\Reportes\Hipotesis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Hipotesis\TipoHipotesisRequest;
use App\Http\Resources\Reportes\Hipotesis\TipoHipotesisResource;
use App\Models\Reportes\Hipotesis\TipoHipotesis;
use App\Services\CrudService;

class TipoHipotesisController extends Controller
{
    protected CrudService $service;
    protected TipoHipotesis $model;

    public function __construct(CrudService $service, TipoHipotesis $model)
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

        $query = $query->withCount('reportes')->orderBy('reportes_count','desc')->get();

        return TipoHipotesisResource::collection($query);
    }

    public function store(TipoHipotesisRequest $request)
    {
        return $this->service->store($request, $this->model, new TipoHipotesisResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new TipoHipotesisResource($this->model::class));
    }

    public function update($id, TipoHipotesisRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new TipoHipotesisResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
