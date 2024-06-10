<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\ColorPielRequest;
use App\Models\Catalogos\CaracteristicasFisicas\Peso;
use Illuminate\Http\Request;

class PesoController extends Controller
{
    
    public function index()
    {
        return Peso::all();
    }

    public function store(PesoRequest $request)
    {
        return Peso::create($request->all());
    }

    public function show($id)
    {
        return Peso::FindOrFail($id);
    }

    public function update($id, PesoRequest $request)
    {
        $peso= Peso::findOrFail($id);
        return $peso->update($request->all());
    }

    public function destroy($id)
    {
        return Peso::findOrFail($id)->delete();
    }
}
