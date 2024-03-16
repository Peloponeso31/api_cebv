<?php

namespace App\Http\Controllers;

use App\Models\Catalogos\Ascendencia;
use Illuminate\Http\Request;

class AscendenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ascendencia::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Ascendencia $ascendencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ascendencia $ascendencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ascendencia $ascendencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ascendencia $ascendencia)
    {
        //
    }
}
