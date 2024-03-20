<?php

namespace App\Http\Controllers\Informaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Informaciones\TipoMedioRequest;
use App\Models\Informaciones\TipoMedio;

class TipoMedioController extends Controller
{
    public function index()
    {
        return TipoMedio::all();
    }

    public function store(TipoMedioRequest $request)
    {
        return TipoMedio::create($request->all());
    }

    public function show($id)
    {
        return TipoMedio::findOrFail($id);
    }

    public function update($id, TipoMedioRequest $request)
    {
        $tipoMedio = TipoMedio::findOrFail($id);

        return $tipoMedio->update($request->all());
    }

    public function destroy($id)
    {
        return TipoMedio::destroy($id);
    }
}
