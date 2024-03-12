<?php

namespace App\Http\Controllers;

use App\Http\Resources\SenasParticularesResource;
use App\Models\SenasParticulares;
use Illuminate\Http\Request;

class SenasParticularesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SenasParticularesResource::collection(SenasParticulares::all());
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
    public function show(SenasParticulares $senasParticulares)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SenasParticulares $senasParticulares)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SenasParticulares $senasParticulares)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SenasParticulares $senasParticulares)
    {
        //
    }
}
