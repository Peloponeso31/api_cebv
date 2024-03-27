<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSenasParticularesRequest;
use App\Http\Requests\UpdateSenasParticularesRequest;
use App\Http\Resources\SenasParticularesResource;
use App\Models\SenasParticulares;
use Illuminate\Http\Request;

class SenasParticularesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SenasParticularesResource::collection(SenasParticulares::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSenasParticularesRequest $request)
    {
        return new SenasParticularesResource(SenasParticulares::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new SenasParticularesResource(SenasParticulares::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateSenasParticularesRequest $request)
    {
        $model = SenasParticulares::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (SenasParticulares::findOrFail($id)->delete()) {
            return response()->json(['mensaje' => 'Borrado correcto']);
        }
    }
}
