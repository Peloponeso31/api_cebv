<?php

namespace App\Http\Controllers\Reportes\Hipotesis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Hipotesis\HipotesisRequest;
use App\Http\Resources\Reportes\Hipotesis\HipotesisResource;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Services\CrudService;

class HipotesisController extends Controller
{
    protected CrudService $service;
    protected Hipotesis $model;

    public function __construct(CrudService $service, Hipotesis $model)
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

        return HipotesisResource::collection($query->get());
    }

    public function store(HipotesisRequest $request)
    {
        return $this->service->store($request, $this->model, new HipotesisResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new HipotesisResource($this->model::class));
    }

    public function update($id, HipotesisRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new HipotesisResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
