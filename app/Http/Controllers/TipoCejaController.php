<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoCejaRequest;
use App\Http\Requests\UpdateTipoCejaRequest;
use App\Models\Catalogos\MediaFiliacion\TipoCeja;

class TipoCejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TipoCeja::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoCejaRequest $request)
    {
        return TipoCeja::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return TipoCeja::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateTipoCejaRequest $request)
    {
        $tipoCeja= TipoCeja::findOrFail($id);
        return $tipoCeja->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return TipoCeja::findOrFail($id)->delete();
    }
}
