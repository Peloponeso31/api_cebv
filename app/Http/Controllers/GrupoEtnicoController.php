<?php

namespace App\Http\Controllers;

use App\Models\Catalogos\GrupoEtnico;
use Illuminate\Http\Request;

class GrupoEtnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GrupoEtnico::all();
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
    public function show(GrupoEtnico $grupoEtnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrupoEtnico $grupoEtnico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GrupoEtnico $grupoEtnico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrupoEtnico $grupoEtnico)
    {
        //
    }
}
