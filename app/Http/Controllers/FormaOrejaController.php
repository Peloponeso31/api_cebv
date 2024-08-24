<?php

namespace App\Http\Controllers;

use App\Http\Resources\FormaOrejaResource;
use App\Models\FormaOreja;
use Illuminate\Http\Request;

class FormaOrejaController extends Controller
{
    public function index()
    {
        return FormaOrejaResource::collection(FormaOreja::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new FormaOrejaResource(FormaOreja::create($data));
    }

    public function show(FormaOreja $formaOreja)
    {
        return new FormaOrejaResource($formaOreja);
    }

    public function update(Request $request, FormaOreja $formaOreja)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $formaOreja->update($data);

        return new FormaOrejaResource($formaOreja);
    }

    public function destroy(FormaOreja $formaOreja)
    {
        $formaOreja->delete();

        return response()->json();
    }
}
