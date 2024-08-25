<?php

namespace App\Http\Controllers\Catalogos\SenasParticulares;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogoResource;
use App\Models\Catalogos\Vista;
use App\Http\Requests\Catalogos\SenasParticulares\VistaSenaRequest;

class VistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CatalogoResource::collection(Vista::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VistaSenaRequest $request)
    {
        return Vista::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return CatalogoResource::make(Vista::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, VistaSenaRequest $request)
    {
        $model = Vista::findOrFail($id);
        return $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return Vista::findOrFail($id)->delete();
    }
}
