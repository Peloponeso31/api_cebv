<?php

namespace App\Http\Controllers\Reportes\Hipotesis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Hipotesis\CircunstanciaRequest;
use App\Models\Reportes\Hipotesis\Circunstancia;

class CircunstanciaController extends Controller
{
    public function index()
    {
        return Circunstancia::all();
    }

    public function store(CircunstanciaRequest $request)
    {
        return Circunstancia::create($request->all());
    }

    public function show($id)
    {
        return Circunstancia::findOrFail($id);
    }

    public function update($id, CircunstanciaRequest $request)
    {
        $model = Circunstancia::findOrFail($id);

        return $model->update($request->all());
    }

    public function destroy($id)
    {
        $model = Circunstancia::findOrFail($id);

        $model->delete();

        return response()->json();
    }
}
