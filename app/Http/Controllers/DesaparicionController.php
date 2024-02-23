<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDesaparicionRequest;
use App\Http\Requests\UpdateDesaparicionRequest;
use App\Http\Resources\DesaparicionResource;
use App\Models\Desaparicion;
use Illuminate\Http\Request;

class DesaparicionController extends Controller
{
    public function index()
    {
        return DesaparicionResource::collection(Desaparicion::all());
    }

    public function store(StoreDesaparicionRequest $request)
    {
        return new DesaparicionResource(Desaparicion::create($request->all()));
    }

    public function show($id)
    {
        $model = Desaparicion::findOrFail($id);

        return new DesaparicionResource($model);
    }

    public function update($id, UpdateDesaparicionRequest $request)
    {
        $model = Desaparicion::findOrFail($id);

        $model->update($request->all());
    }

    public function destroy(Request $request, $id)
    {
        if ($request->user()->tokenCan('delete')) {
            $model = Desaparicion::findOrFail($id);

            $model->delete();

            return response()->json(['message' => 'Deleted']);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
