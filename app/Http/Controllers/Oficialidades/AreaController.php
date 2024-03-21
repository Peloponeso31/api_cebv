<?php

namespace App\Http\Controllers\Oficialidades;

use App\Http\Controllers\Controller;
use App\Http\Requests\Oficialidades\AreaRequest;
use App\Http\Resources\Oficialidades\AreaResource;
use App\Models\Oficialidades\Area;
use App\Services\CrudService;

class AreaController extends Controller
{
    protected CrudService $service;

    public function __construct(CrudService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $query = Area::query();

        if (request()->has('search')) {
            $query = Area::search(request('search'));
        }

        return $query->get();
    }

    public function store(AreaRequest $request)
    {
        return $this->service->store($request, new Area(), new AreaResource(Area::class));
    }

    public function show($id)
    {
        return $this->service->show($id, new Area(), new AreaResource(Area::class));
    }

    public function update($id, AreaRequest $request)
    {
        return $this->service->update($id, new Area(), new AreaResource(Area::class), $request);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, new Area());
    }
}
