<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Http\Resources\CatalogoResource;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(Color::all());
    }


    public function store(StoreColorRequest $request)
    {
        return new CatalogoResource(Color::create($request->all()));
    }


    public function show($id)
    {
        $model = Color::findOrFail($id);

        return new CatalogoResource($model);
    }


    public function update($id, UpdateColorRequest $request)
    {
        $model = Color::findOrFail($id);

        $model->update($request->all());
    }


    public function destroy($id)
    {
            $model = Color::findOrFail($id);
            $model->delete();
            return response()->json(['message' => 'Deleted']);
    }
}
