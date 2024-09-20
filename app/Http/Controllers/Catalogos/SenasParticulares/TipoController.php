<?php

namespace App\Http\Controllers\Catalogos\SenasParticulares;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogoResource;
use App\Models\Catalogos\Tipo;
use App\Http\Requests\Catalogos\SenasParticulares\TipoSenaRequest;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CatalogoResource::collection(Tipo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoSenaRequest $request)
    {
        return Tipo::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return CatalogoResource::make(Tipo::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, TipoSenaRequest $request)
    {
        $model = Tipo::findOrFail($id);
        return $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return Tipo::findOrFail($id)->delete();
    }
}
