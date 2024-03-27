<?php

namespace App\Http\Controllers;

use App\Http\Resources\EtniaResource;
use App\Models\Etnia;
use Illuminate\Http\Request;

class EtniaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EtniaResource::collection(Etnia::all());
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
    public function show(Etnia $etnia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etnia $etnia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etnia $etnia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etnia $etnia)
    {
        //
    }
}