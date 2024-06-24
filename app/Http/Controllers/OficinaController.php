<?php

namespace App\Http\Controllers;

use App\Http\Requests\OficinaRequest;
use App\Models\Catalogos\Oficina;

class OficinaController extends Controller
{

    public function index()
    {
        return Oficina::all();
    }

    public function store(OficinaRequest $request)
    {
        return Oficina::create($request->all());
    }

    public function show($id)
    {
        return Oficina::FindOrFail($id);
    }

    public function update($id, OficinaRequest $request)
    {
        $oficina = Oficina::findOrFail($id);
        return $oficina->update($request->all());
    }

    public function destroy($id)
    {
        return Oficina::FindOrFail($id)->delete();
    }
}
