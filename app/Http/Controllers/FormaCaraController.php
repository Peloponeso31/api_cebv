<?php

namespace App\Http\Controllers;

use App\Http\Resources\FormaCaraResource;
use App\Models\FormaCara;
use Illuminate\Http\Request;

class FormaCaraController extends Controller
{
    public function index()
    {
        return FormaCaraResource::collection(FormaCara::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new FormaCaraResource(FormaCara::create($data));
    }

    public function show(FormaCara $formaCara)
    {
        return new FormaCaraResource($formaCara);
    }

    public function update(Request $request, FormaCara $formaCara)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $formaCara->update($data);

        return new FormaCaraResource($formaCara);
    }

    public function destroy(FormaCara $formaCara)
    {
        $formaCara->delete();

        return response()->json();
    }
}
