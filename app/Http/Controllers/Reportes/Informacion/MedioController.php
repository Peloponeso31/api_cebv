<?php

namespace App\Http\Controllers\Reportes\Informacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\MedioRequest;
use App\Models\Reportes\Informacion\Medio;

class MedioController extends Controller
{
    public function index()
    {
        return Medio::all();
    }

    public function store(MedioRequest $request)
    {
        return Medio::create($request->validated());
    }

    public function show(Medio $medio)
    {
        return $medio;
    }

    public function update(MedioRequest $request, Medio $medio)
    {
        $medio->update($request->validated());

        return $medio;
    }

    public function destroy(Medio $medio)
    {
        $medio->delete();

        return response()->json();
    }
}
