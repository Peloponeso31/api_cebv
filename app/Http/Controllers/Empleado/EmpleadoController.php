<?php

namespace App\Http\Controllers\Empleado;

use App\Http\Controllers\Controller;
use App\Http\Requests\Empleado\StoreEmpleadoRequest;
use App\Http\Requests\Empleado\UpdateEmpleadoRequest;
use App\Http\Resources\Empleado\EmpleadoResource;
use App\Models\Empleado\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    
    public function index()
    {
        return EmpleadoResource::collection(Empleado::all());
    }

    
    public function store(StoreEmpleadoRequest $request)
    {
        return new EmpleadoResource(Empleado::create($request->all()));
    }

    
    public function show($id)
    {
        $model = Empleado::findOrFail($id);

        return new EmpleadoResource($model);
    }

    
    public function update($id, UpdateEmpleadoRequest $request)
    {
        $model = Empleado::findOrFail($id);

        $model->update($request->all());
    }

    
    public function destroy(Request $request, $id)
    {
        if ($request->user()->tokenCan('delete')) {
            $model = Empleado::findOrFail($id);

            $model->delete();

            return response()->json(['message' => 'Deleted']);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
