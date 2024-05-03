<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoCalvicieRequest;
use App\Http\Requests\UpdateTipoCalvicieRequest;
use App\Models\Catalogos\MediaFiliacion\TipoCalvicie;

class TipoCalvicieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TipoCalvicie::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoCalvicieRequest $request)
    {
        return TipoCalvicie::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return TipoCalvicie::FindOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateTipoCalvicieRequest $request)
    {
        $tipoCalvicie= TipoCalvicie::findOrFail($id);
        return $tipoCalvicie->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return TipoCalvicie::findOrFail($id)->delete();
    }
}
