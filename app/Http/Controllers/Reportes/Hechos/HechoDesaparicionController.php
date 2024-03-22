<?php

namespace App\Http\Controllers\Reportes\Hechos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Informacion\HechoDesaparicionRequest;
use App\Http\Resources\Reportes\Hechos\HechoDesaparicionResource;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Services\CrudService;

class HechoDesaparicionController extends Controller
{
    protected CrudService $service;
    protected HechoDesaparicion $model;

    public function __construct(CrudService $service, HechoDesaparicion $model)
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

        return HechoDesaparicionResource::collection($query->get());
    }

    public function store(HechoDesaparicionRequest $request)
    {
        return $this->service->store($request, $this->model, new HechoDesaparicionResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new HechoDesaparicionResource($this->model::class));
    }

    public function update($id, HechoDesaparicionRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new HechoDesaparicionResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
