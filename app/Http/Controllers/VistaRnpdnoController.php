<?php

namespace App\Http\Controllers;

use App\Models\Catalogos\VistaRnpdno;
use Illuminate\Http\Request;

class VistaRnpdnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VistaRnpdno::all();
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
    public function show(VistaRnpdno $vistaRnpdno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VistaRnpdno $vistaRnpdno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VistaRnpdno $vistaRnpdno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VistaRnpdno $vistaRnpdno)
    {
        //
    }
}
