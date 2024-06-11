<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvanceEscolarRequest;
use App\Http\Resources\AvanceEscolarResource;
use App\Models\AvanceEscolar;
use Illuminate\Http\Request;

class AvanceEscolarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AvanceEscolarResource::collection(AvanceEscolar::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AvanceEscolarRequest $request)
    {
        return new AvanceEscolarResource(AvanceEscolar::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $avance = AvanceEscolar::findOrFail($id);

        return new AvanceEscolarResource($avance);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, AvanceEscolarRequest $request)
    {
        $avance = AvanceEscolar::findOrFail($id);

        $avance->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (AvanceEscolar::findOrFail($id)->delete()) {
            return response()->json(['mensaje' => 'Borrado correcto']);
        }
    }
}
