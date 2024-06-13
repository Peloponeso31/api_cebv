<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApodoRequest;
use App\Http\Resources\ApodoResource;
use App\Models\Apodo;
use App\Services\CrudService;

class ApodoController extends Controller
{
    protected CrudService $service;
    protected Apodo $model;

    public function __construct(CrudService $service, Apodo $model)
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

        return ApodoResource::collection($query->get());
    }

    public function store(ApodoRequest $request)
    {
        return $this->service->store($request, $this->model, new ApodoResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new ApodoResource($this->model::class));
    }

    public function update($id, ApodoRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new ApodoResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
