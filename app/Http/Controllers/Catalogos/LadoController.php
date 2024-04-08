<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Models\Catalogos\Lado;
use App\Http\Requests\Catalogos\LadoSenaRequest;

class LadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Lado::all();
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
        return Lado::findOrFail($id);
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
