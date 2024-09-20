<?php

namespace App\Http\Controllers\Reportes\Relaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Relaciones\DesaparecidoRequest;
use App\Http\Resources\DesaparecidoFolioPersonaResource;
use App\Http\Resources\Reportes\Relaciones\DesaparecidoResource;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Services\CrudService;

class DesaparecidoController extends Controller
{
    public function __construct(CrudService $service, Desaparecido $model) {
        $this->service = $service;
        $this->model = $model;
    }

    public function index()
    {
        return response()
            ->json(DesaparecidoResource::collection(Desaparecido::all()))
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
    protected CrudService $service;
    protected Desaparecido $model;


    public function store(DesaparecidoRequest $request)
    {
        return $this->service->store($request, $this->model, new DesaparecidoResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new DesaparecidoResource($this->model::class));
    }

    public function update($id, DesaparecidoRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new DesaparecidoResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }

    public function desaparecido_persona_folio() {
        return DesaparecidoFolioPersonaResource::collection(Desaparecido::all());
    }
}
