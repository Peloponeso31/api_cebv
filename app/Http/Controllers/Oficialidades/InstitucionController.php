<?php

namespace App\Http\Controllers\Oficialidades;

use App\Http\Controllers\Controller;
use App\Http\Requests\Oficialidades\InstitucionRequest;
use App\Models\Oficialidades\Institucion;

class InstitucionController extends Controller
{
    public function index()
    {
        return Institucion::all();
    }

    public function store(InstitucionRequest $request)
    {
        return Institucion::create($request->validated());
    }

    public function show(Institucion $institucion)
    {
        return $institucion;
    }

    public function update(InstitucionRequest $request, Institucion $institucion)
    {
        $institucion->update($request->validated());

        return $institucion;
    }

    public function destroy(Institucion $institucion)
    {
        $institucion->delete();

        return response()->json();
    }
}
