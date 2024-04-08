<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Models\Catalogos\Tipo;
use App\Http\Requests\Catalogos\TipoSenaRequest;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tipo::all();
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
        return Tipo::findOrFail($id);
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
