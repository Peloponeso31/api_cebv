<?php

namespace App\Http\Controllers\Informaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Informaciones\MedioRequest;
use App\Http\Resources\Informaciones\MedioResource;
use App\Models\Informaciones\Medio;
use App\Services\CrudService;

class MedioController extends Controller
{
    protected CrudService $service;

    public function __construct(CrudService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $query = Medio::query();

        if (request()->has('search')) {
            $query = Medio::search(request('search'));
        }

        return MedioResource::collection($query->get());
    }

    public function store(MedioRequest $request)
    {
        return $this->service->store($request, new Medio(), new MedioResource(Medio::class));
    }

    public function show($id)
    {
        return $this->service->show($id, new Medio(), new MedioResource(Medio::class));
    }

    public function update($id, MedioRequest $request)
    {
        return $this->service->update($id, new Medio(), new MedioResource(Medio::class), $request);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, new Medio());
    }
}
