<?php

namespace App\Http\Controllers;

use App\Http\Requests\PseudonimoRequest;
use App\Http\Resources\PseudonimoResource;
use App\Models\Pseudonimo;
use App\Services\CrudService;

class PseudonimoController extends Controller
{
    protected CrudService $service;
    protected Pseudonimo $model;

    public function __construct(CrudService $service, Pseudonimo $model)
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

        return PseudonimoResource::collection($query->get());
    }

    public function store(PseudonimoRequest $request)
    {
        return $this->service->store($request, $this->model, new PseudonimoResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new PseudonimoResource($this->model::class));
    }

    public function update($id, PseudonimoRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new PseudonimoResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
