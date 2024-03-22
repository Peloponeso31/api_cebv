<?php

namespace App\Http\Controllers\Informaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Informaciones\TipoMedioRequest;
use App\Http\Resources\Informaciones\TipoMedioResource;
use App\Models\Informaciones\TipoMedio;
use App\Services\CrudService;

class TipoMedioController extends Controller
{
    protected CrudService $service;
    protected TipoMedio $model;

    public function __construct(CrudService $service, TipoMedio $model)
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

        return TipoMedioResource::collection($query->get());
    }

    public function store(TipoMedioRequest $request)
    {
        return $this->service->store($request, $this->model, new TipoMedioResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new TipoMedioResource($this->model::class));
    }

    public function update($id, TipoMedioRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new TipoMedioResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
