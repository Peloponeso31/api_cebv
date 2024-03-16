<?php

namespace App\Http\Controllers;

use App\Models\Catalogos\TamanoOjos;
use App\Models\Catalogos\TamanoOrejas;
use Illuminate\Http\Request;

class TamanoOrejasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TamanoOrejas::all();
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
    public function show(TamanoOrejas $tamanoOrejas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TamanoOrejas $tamanoOrejas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TamanoOrejas $tamanoOrejas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TamanoOrejas $tamanoOrejas)
    {
        //
    }
}
