<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contextos\StoreContextoEconomicoRequest;
use App\Http\Requests\Contextos\UpdateContextoEconomicoRequest;
use App\Http\Resources\Contextos\ContextoEconomicoResource;
use App\Models\Contextos\ContextoEconomico;
use Illuminate\Http\Request;

class ContextoEconomicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContextoEconomicoResource::collection(ContextoEconomico::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContextoEconomicoRequest $request)
    {
        return new ContextoEconomicoResource(ContextoEconomico::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $model = ContextoEconomico::findOrFail($id);

        return new ContextoEconomicoResource($model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateContextoEconomicoRequest $request)
    {
        $model = ContextoEconomico::findOrFail($id);

        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->tokenCan('delete')) {
            $model = ContextoEconomico::findOrFail($id);

            $model->delete();

            return response()->json(['message' => 'Deleted']);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
