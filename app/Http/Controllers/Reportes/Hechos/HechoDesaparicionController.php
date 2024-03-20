<?php

namespace App\Http\Controllers\Reportes\Hechos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Informacion\HechoDesaparicionRequest;
use App\Models\Reportes\Hechos\HechoDesaparicion;

class HechoDesaparicionController extends Controller
{
    public function index()
    {
        $query = HechoDesaparicion::query();

        if (request()->has('search')) {
            $query = HechoDesaparicion::search(request('search'));
        }

        return $query->get();
    }

    public function store(HechoDesaparicionRequest $request)
    {
        return HechoDesaparicion::create($request->all());
    }

    public function show($id)
    {
        return HechoDesaparicion::findOrFail($id);
    }

    public function update($id, HechoDesaparicionRequest $request)
    {
        $model = HechoDesaparicion::findOrFail($id);

        return $model->update($request->all());
    }

    public function destroy($id)
    {
        return HechoDesaparicion::destroy($id);
    }
}
