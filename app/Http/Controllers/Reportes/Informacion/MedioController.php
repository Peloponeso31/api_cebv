<?php

namespace App\Http\Controllers\Reportes\Informacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Informacion\MedioRequest;
use App\Models\Reportes\Informacion\Medio;

class MedioController extends Controller
{
    public function index()
    {
        $query = Medio::query();

        if (request()->has('search')) {
            $query = Medio::search(request('search'));
        }

        return $query->get();
    }

    public function store(MedioRequest $request)
    {
        return Medio::create($request->validated());
    }

    public function show($id)
    {
        return Medio::findOrFail($id);
    }

    public function update($id, MedioRequest $request)
    {
        $medio = Medio::findOrFail($id);

        $medio->update($request->validated());

        return $medio;
    }

    public function destroy($id)
    {
        $medio = Medio::findOrFail($id);

        $medio->delete();

        return response()->json();
    }
}
