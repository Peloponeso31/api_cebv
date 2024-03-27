<?php

namespace App\Http\Controllers\Personas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personas\ParentescoRequest;
use App\Http\Resources\Personas\ParentescoResource;
use App\Models\Personas\Parentesco;
use App\Services\CrudService;

class ParentescoController extends Controller
{
    protected CrudService $service;
    protected Parentesco $model;

    public function __construct(CrudService $service, Parentesco $model)
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

        return ParentescoResource::collection($query->get());
    }

    public function store(ParentescoRequest $request)
    {
        return $this->service->store($request, $this->model, new ParentescoResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new ParentescoResource($this->model::class));
    }

    public function update($id, ParentescoRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new ParentescoResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
