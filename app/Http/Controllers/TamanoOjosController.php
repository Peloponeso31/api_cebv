<?php

namespace App\Http\Controllers;

use App\Models\Catalogos\TamanoOjos;
use Illuminate\Http\Request;

class TamanoOjosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TamanoOjos::all();
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
    public function show(TamanoOjos $tamanoOjos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TamanoOjos $tamanoOjos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TamanoOjos $tamanoOjos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TamanoOjos $tamanoOjos)
    {
        //
    }
}
