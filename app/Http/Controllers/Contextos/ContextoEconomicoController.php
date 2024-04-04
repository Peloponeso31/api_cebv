<?php

namespace App\Http\Controllers\Contextos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contextos\StoreContextoEconomicoRequest;
use App\Http\Requests\Contextos\UpdateContextoEconomicoRequest;
use App\Http\Resources\Contextos\ContextoEconomicoResource;
use App\Models\Contextos\ContextoEconomico;
use Illuminate\Http\Request;

class ContextoEconomicoController extends Controller
{

    public function __construct() {
        $this->middleware(['can:consulta'])->only('index','show');
        $this->middleware(['can:agregar'])->only('store');
        $this->middleware(['can:edicion'])->only('update');
        $this->middleware(['can:eliminacion'])->only('destroy');;
    }

    
    public function index()
    {
        return ContextoEconomicoResource::collection(ContextoEconomico::all());
    }

    
    public function store(StoreContextoEconomicoRequest $request)
    {
        return new ContextoEconomicoResource(ContextoEconomico::create($request->all()));
    }

    
    public function show($id)
    {
        $model = ContextoEconomico::findOrFail($id);

        return new ContextoEconomicoResource($model);
    }

    
    public function update($id, UpdateContextoEconomicoRequest $request)
    {
        $model = ContextoEconomico::findOrFail($id);

        $model->update($request->all());
    }

    
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
