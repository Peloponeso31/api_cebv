<?php

namespace App\Http\Controllers;

use App\Http\Resources\NacionalidadResource;
use App\Models\Nacionalidad;
use App\Services\CrudService;

class NacionalidadController extends Controller
{
    protected CrudService $service;
    protected Nacionalidad $model;

    public function __construct(CrudService $service, Nacionalidad $model)
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

        return NacionalidadResource::collection($query->get());
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new NacionalidadResource($this->model::class));
    }

}