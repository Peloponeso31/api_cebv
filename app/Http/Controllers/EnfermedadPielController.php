<?php

namespace App\Http\Controllers;

use App\Http\Resources\EnfermedadPielResource;
use App\Models\EnfermedadPiel;
use Illuminate\Http\Request;

class EnfermedadPielController extends Controller
{
    public function index()
    {
        return EnfermedadPielResource::collection(EnfermedadPiel::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new EnfermedadPielResource(EnfermedadPiel::create($data));
    }

    public function show(EnfermedadPiel $enfermedadPiel)
    {
        return new EnfermedadPielResource($enfermedadPiel);
    }

    public function update(Request $request, EnfermedadPiel $enfermedadPiel)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $enfermedadPiel->update($data);

        return new EnfermedadPielResource($enfermedadPiel);
    }

    public function destroy(EnfermedadPiel $enfermedadPiel)
    {
        $enfermedadPiel->delete();

        return response()->json();
    }
}
