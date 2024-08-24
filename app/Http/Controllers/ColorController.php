<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Http\Resources\ColorResource;
use App\Models\Color;
use Request;

class ColorController extends Controller
{
    public function index()
    {
        return ColorResource::collection(Color::all());
    }

    
    public function store(StoreColorRequest $request)
    {
        return new ColorResource(Color::create($request->all()));
    }

    
    public function show($id)
    {
        $model = Color::findOrFail($id);

        return new ColorResource($model);
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
