<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContextoFamiliarRequest;
use App\Http\Requests\UpdateContextoFamiliarRequest;
use App\Http\Resources\ContextoFamiliarResource;
use App\Models\ContextoFamiliar;
use Illuminate\Http\Request;

class ContextoFamiliarController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:buscar') ->only('index', 'show');
        $this->middleware('can:creacion') ->only('store');
        $this->middleware('can:edicion') ->only('update');
        $this->middleware('can:eliminacion') ->only('destroy');  
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContextoFamiliarResource::collection(ContextoFamiliar::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContextoFamiliarRequest $request)
    {
        return new ContextoFamiliarResource(ContextoFamiliar::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = ContextoFamiliar::findOrFail($id);

        return new ContextoFamiliarResource($model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateContextoFamiliarRequest $request)
    {
        $model = ContextoFamiliar::findOrFail($id);

        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->tokenCan('delete')) {
            $model = ContextoFamiliar::findOrFail($id);

            $model->delete();

            return response()->json(['message' => 'Deleted']);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
