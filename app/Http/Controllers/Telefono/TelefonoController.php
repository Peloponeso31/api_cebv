<?php

namespace App\Http\Controllers\Telefono;

use App\Http\Controllers\Controller;
use App\Http\Requests\Telefono\TelefonoRequest;
use App\Http\Resources\Telefono\TelefonoResource;
use App\Models\Telefono\Telefono;
use App\Services\CrudService;


class TelefonoController extends Controller
{

    protected CrudService $service;
    protected Telefono $model;

    public function __construct(CrudService $service, Telefono $model)
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

        return TelefonoResource::collection($query->get());
    }

    
    public function store(TelefonoRequest $request)
    {
        return $this->service->store($request, $this->model, new TelefonoResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new TelefonoResource($this->model::class));
    }

    public function update($id, TelefonoRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new TelefonoResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
