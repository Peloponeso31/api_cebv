<?php

namespace App\Http\Controllers\Informaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Informaciones\SitioRequest;
use App\Http\Resources\Informaciones\SitioResource;
use App\Models\Informaciones\Sitio;
use App\Services\CrudService;

class SitioController extends Controller
{

    protected CrudService $service;

    public function __construct(CrudService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $query = Sitio::query();

        if (request()->has('search')) {
            $query = Sitio::search(request('search'));
        }

        return SitioResource::collection($query->get());
    }

    public function store(SitioRequest $request)
    {
        return $this->service->store($request, new Sitio(), new SitioResource(Sitio::class));
    }

    public function show($id)
    {
        return $this->service->show($id, new Sitio(), new SitioResource(Sitio::class));
    }

    public function update($id, SitioRequest $request)
    {
        return $this->service->update($id, new Sitio(), new SitioResource(Sitio::class), $request);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, new Sitio());
    }
}
