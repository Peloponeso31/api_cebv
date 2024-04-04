<?php

namespace App\Http\Controllers\Contextos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contextos\StoreContextoFamiliarRequest;
use App\Http\Requests\Contextos\UpdateContextoFamiliarRequest;
use App\Http\Resources\Contextos\ContextoFamiliarResource;
use App\Models\Contextos\ContextoFamiliar;
use Illuminate\Http\Request;

class ContextoFamiliarController extends Controller
{

    public function __construct() {
        $this->middleware(['can:consulta'])->only('index','show');
        $this->middleware(['can:agregar'])->only('store');
        $this->middleware(['can:edicion'])->only('update');
        $this->middleware(['can:eliminacion'])->only('destroy');;
    }
    
    
    public function index()
    {
        return ContextoFamiliarResource::collection(ContextoFamiliar::all());
    }

    
    public function store(StoreContextoFamiliarRequest $request)
    {
        return new ContextoFamiliarResource(ContextoFamiliar::create($request->all()));
    }

    
    public function show(string $id)
    {
        $model = ContextoFamiliar::findOrFail($id);

        return new ContextoFamiliarResource($model);
    }

    
    public function update($id, UpdateContextoFamiliarRequest $request)
    {
        $model = ContextoFamiliar::findOrFail($id);

        $model->update($request->all());
    }

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
