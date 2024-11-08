<?php

namespace App\Http\Controllers\Personas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personas\EstatusPersonaRequest;
use App\Http\Resources\BasicResource;
use App\Models\Personas\EstatusPersona;
use App\Services\CrudService;

class EstatusPersonaController extends Controller
{
    protected CrudService $service;
    protected EstatusPersona $model;

    public function __construct(CrudService $service, EstatusPersona $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    public function index()
    {
        $query = $this->model::withCount(['desaparecidosRpdno']);

        if (request()->has('search')) {
            $query->search(request('search'));
        }

        return BasicResource::collection($query->get());
    }

    public function store(EstatusPersonaRequest $request)
    {
        return $this->service->store($request, $this->model, new BasicResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new BasicResource($this->model::class));
    }

    public function update($id, EstatusPersonaRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new BasicResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }
}
