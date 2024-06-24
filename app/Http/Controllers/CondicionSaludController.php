<?php

namespace App\Http\Controllers;

use App\Http\Resources\CondicionSaludResource;
use App\Models\CondicionSalud;
use Illuminate\Http\Request;

class CondicionSaludController extends Controller
{
    public function index()
    {
        return CondicionSaludResource::collection(CondicionSalud::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CondicionSaludResource(CondicionSalud::create($data));
    }

    public function show(CondicionSalud $condicionSalud)
    {
        return new CondicionSaludResource($condicionSalud);
    }

    public function update(Request $request, CondicionSalud $condicionSalud)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $condicionSalud->update($data);

        return new CondicionSaludResource($condicionSalud);
    }

    public function destroy(CondicionSalud $condicionSalud)
    {
        $condicionSalud->delete();

        return response()->json();
    }
}
