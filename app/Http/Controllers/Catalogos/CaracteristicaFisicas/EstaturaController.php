<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\EstaturaRequest;
use App\Models\Catalogos\CaracteristicasFisicas\Estatura;
use Illuminate\Http\Request;

class EstaturaController extends Controller
{
    public function index()
    {
        return Estatura::all();
    }

    public function store(EstaturaRequest $request)
    {
        return Estarura::create($request->all())
    }

    public function show($id)
    {
        return Estatura::FindOrFail($id);
    }

    public function update($id, EstaturaRequest $request)
    {
        $estatura= Estatura::findOrFail($id);
        return $estatura->update($request->all());
    }

    public function destroy(Estatura $estatura)
    {
        return Estatura::FindOrFail($id)->delete();
    }
}
