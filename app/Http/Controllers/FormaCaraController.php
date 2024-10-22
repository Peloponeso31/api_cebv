<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\FormaCara;
use Illuminate\Http\Request;

class FormaCaraController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(FormaCara::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(FormaCara::create($data));
    }

    public function show(FormaCara $formaCara)
    {
        return new CatalogoResource($formaCara);
    }

    public function update(Request $request, FormaCara $formaCara)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $formaCara->update($data);

        return new CatalogoResource($formaCara);
    }

    public function destroy(FormaCara $formaCara)
    {
        $formaCara->delete();

        return response()->json();
    }
}
