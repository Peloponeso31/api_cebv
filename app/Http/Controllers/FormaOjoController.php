<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormaOjoRequest;
use App\Http\Requests\UpdateFormaOjoRequest;
use App\Models\Catalogos\MediaFiliacion\FormaOjo;

class FormaOjoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FormaOjo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormaOjoRequest $request)
    {
        return FormaOjo::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return FormaOjo::FindOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateFormaOjoRequest $request)
    {
        $formaojo= FormaOjo::findOrFail($id);
        return $formaOjo->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return FormaOjo::findOrFail($id)->delete();
    }
}
