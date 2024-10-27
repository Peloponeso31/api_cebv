<?php

namespace App\Http\Controllers\Catalogos\SenasParticulares;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogoColorResource;
use App\Http\Resources\LadoResource;
use App\Models\Catalogos\Lado;
use App\Http\Requests\Catalogos\SenasParticulares\LadoSenaRequest;

class LadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CatalogoColorResource::collection(Lado::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(LadoSenaRequest $request)
    {
        return Lado::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return LadoResource::make(Lado::findOrFail($id));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($id, LadoSenaRequest $request)
    {
        $model = Lado::findOrFail($id);
        return $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return Lado::findOrFail($id)->delete();
    }
}
