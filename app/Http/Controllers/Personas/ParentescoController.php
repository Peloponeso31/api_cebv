<?php

namespace App\Http\Controllers\Personas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personas\ParentescoRequest;
use App\Models\Personas\Parentesco;

class ParentescoController extends Controller
{
    public function index()
    {
        return Parentesco::all();
    }

    public function store(ParentescoRequest $request)
    {
        return Parentesco::create($request->validated());
    }

    public function show(Parentesco $parentesco)
    {
        return $parentesco;
    }

    public function update(ParentescoRequest $request, Parentesco $parentesco)
    {
        $parentesco->update($request->validated());

        return $parentesco;
    }

    public function destroy(Parentesco $parentesco)
    {
        $parentesco->delete();

        return response()->json();
    }
}
