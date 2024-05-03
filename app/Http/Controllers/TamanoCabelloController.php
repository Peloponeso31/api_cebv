<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTamanoCabelloRequest;
use App\Http\Requests\UpdateTamanoCabelloRequest;
use App\Models\Catalogos\MediaFiliacion\TamanoCabello;

class TamanoCabelloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TamanoCabello::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTamanoCabelloRequest $request)
    {
        return TamanoCabello::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return TamanoCabello::FindOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateTamanoCabelloRequest $request)
    {
        $tamanoCabello= TamanoCabello::findOrFail($id);
        return $tamanoCabello->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return TamanoCabello::findOrFail($id)->delete();
    }
}
