<?php

namespace App\Http\Controllers\Reportes\Informacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\StoreHechoDesaparicionRequest;
use App\Http\Requests\Reportes\UpdateHechoDesaparicionRequest;
use App\Http\Resources\Reportes\HechoDesaparicionResource;
use App\Models\Reportes\Informacion\HechoDesaparicion;
use Illuminate\Http\Request;

class HechoDesaparicionController extends Controller
{
    public function index()
    {
        return HechoDesaparicionResource::collection(HechoDesaparicion::all());
    }

    public function store(StoreHechoDesaparicionRequest $request)
    {
        return new HechoDesaparicionResource(HechoDesaparicion::create($request->all()));
    }

    public function show($id)
    {
        $model = HechoDesaparicion::findOrFail($id);

        return new HechoDesaparicionResource($model);
    }

    public function update($id, UpdateHechoDesaparicionRequest $request)
    {
        $model = HechoDesaparicion::findOrFail($id);

        $model->update($request->all());
    }

    public function destroy(Request $request, $id)
    {
        if ($request->user()->tokenCan('delete')) {
            $model = HechoDesaparicion::findOrFail($id);

            $model->delete();

            return response()->json(['message' => 'Deleted']);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
