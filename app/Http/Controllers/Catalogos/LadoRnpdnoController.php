<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Models\Catalogos\LadoRnpdno;
use Illuminate\Http\Request;

class LadoRnpdnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LadoRnpdno::all();
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
    public function show(LadoRnpdno $ladoRnpdno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LadoRnpdno $ladoRnpdno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LadoRnpdno $ladoRnpdno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LadoRnpdno $ladoRnpdno)
    {
        //
    }
}
