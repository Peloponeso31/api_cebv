<?php

namespace App\Http\Controllers\Oficialidades;

use App\Http\Controllers\Controller;
use App\Http\Requests\Oficialidades\InstitucionRequest;
use App\Http\Resources\Oficialidades\InstitucionResource;
use App\Models\Oficialidades\Institucion;
use App\Services\CrudService;

class InstitucionController extends Controller
{
    protected CrudService $service;

    public function __construct(CrudService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $query = Institucion::query();

        if (request()->has('search')) {
            $query = Institucion::search(request('search'));
        }

        return InstitucionResource::collection($query->get());
    }

    public function store(InstitucionRequest $request)
    {
        return $this->service->store($request, new Institucion(), new InstitucionResource(Institucion::class));
    }

    public function show($id)
    {
        return $this->service->show($id, new Institucion(), new InstitucionResource(Institucion::class));
    }

    public function update($id, InstitucionRequest $request)
    {
        return $this->service->update($id, new Institucion(), new InstitucionResource(Institucion::class), $request);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, new Institucion());
    }
}
