<?php

namespace App\Http\Controllers\Catalogos\SenasParticulares;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogoColorResource;
use App\Models\Catalogos\RegionCuerpo;
use App\Http\Requests\Catalogos\SenasParticulares\RegionCuerpoSenaRequest;

class RegionCuerpoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CatalogoColorResource::collection(RegionCuerpo::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(RegionCuerpoSenaRequest $request)
    {
        return RegionCuerpo::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return CatalogoColorResource::make(RegionCuerpo::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, RegionCuerpoSenaRequest $request)
    {
        $model = RegionCuerpo::findOrFail($id);
        return $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return RegionCuerpo::findOrFail($id)->delete();
    }
}
