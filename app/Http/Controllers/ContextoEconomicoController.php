<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContextoEconomicoResource;
use App\Http\Resources\DesaparicionResource;
use App\Models\ContextoEconomico;
use Illuminate\Http\Request;

class ContextoEconomicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContextoEconomicoResource::collection(ContextoEconomico::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
