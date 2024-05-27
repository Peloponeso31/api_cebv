<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTamanoBocaRequest;
use App\Http\Requests\UpdateTamanoBocaRequest;
use App\Models\Catalogos\MediaFiliacion\TamanoBoca;

class TamanoBocaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TamanoBoca::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTamanoBocaRequest $request)
    {
        return TamanoBoca::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return TamanoBoca::FindOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateTamanoBocaRequest $request)
    {
        $tamanoboca= TamanoBoca::findOrFail($id);
        return $tamanoboca->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return TamanoBoca::findOrFail($id)->delete();
    }
}
