<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProyeccionMentonRequest;
use App\Http\Requests\UpdateProyeccionMentonRequest;
use App\Models\Catalogos\MediaFiliacion\TipoProyeccionMenton;

class TipoProyeccionMentonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TipoProyeccionMenton::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoProyeccionMentonRequest $request)
    {
        return TipoProyeccionMenton::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return TipoProyeccionMenton::findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateTipoProyeccionMentonRequest $request)
    {
        $tipoProyeccionMenton= TipoProyeccionMenton::findOrFail($id);
        return $tipoProyeccionMenton->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return TipoProyeccionMenton::findOrFail($id)->delete();
    }
}
