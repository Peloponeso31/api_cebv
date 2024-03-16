<?php

namespace App\Http\Controllers;

use App\Models\Catalogos\Complexion;
use Illuminate\Http\Request;

class ComplexionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Complexion::all();
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
    public function show(Complexion $complexion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complexion $complexion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complexion $complexion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complexion $complexion)
    {
        //
    }
}
