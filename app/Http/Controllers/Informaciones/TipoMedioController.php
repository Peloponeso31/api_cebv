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

    public function __construct(CrudService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $query = TipoMedio::query();

        if (request()->has('search')) {
            $query = TipoMedio::search(request('search'));
        }

        return TipoMedioResource::collection($query->get());
    }

    public function store(TipoMedioRequest $request)
    {
        return $this->service->store($request, new TipoMedio(), new TipoMedioResource(TipoMedio::class));
    }

    public function show($id)
    {
        return $this->service->show($id, new TipoMedio(), new TipoMedioResource(TipoMedio::class));
    }

    public function update($id, TipoMedioRequest $request)
    {
        return $this->service->update($id, new TipoMedio(), new TipoMedioResource(TipoMedio::class), $request);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, new TipoMedio());
    }
}
