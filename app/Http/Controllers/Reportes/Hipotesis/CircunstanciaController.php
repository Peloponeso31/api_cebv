<?php

namespace App\Http\Controllers\Reportes\Hipotesis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Hipotesis\CircunstanciaRequest as FormRequest;
use App\Models\Reportes\Hipotesis\Circunstancia as Model;

class CircunstanciaController extends Controller
{
    public function index()
    {
        return Model::all();
    }

    public function store(FormRequest $request)
    {
        return Model::create($request->all());
    }

    public function show($id)
    {
        return Model::findOrFail($id);
    }

    public function update($id, FormRequest $request)
    {
        $model = Model::findOrFail($id);

        $model->update($request->all());
    }

    public function destroy($id)
    {
        $model = Model::findOrFail($id);

        $model->delete();

        return response()->json();
    }
}
