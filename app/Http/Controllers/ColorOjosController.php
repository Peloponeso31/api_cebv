<?php

namespace App\Http\Controllers;

use App\Models\Catalogos\ColorOjos;
use Illuminate\Http\Request;

class ColorOjosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ColorOjos::all();
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
    public function show(ColorOjos $colorOjos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ColorOjos $colorOjos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ColorOjos $colorOjos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ColorOjos $colorOjos)
    {
        //
    }
}
