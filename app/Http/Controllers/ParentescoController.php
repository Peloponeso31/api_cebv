<?php

namespace App\Http\Controllers;

use App\Models\Parentesco;
use Illuminate\Http\Request;

class ParentescoController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Parentesco::all();
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
    public function show(Parentesco $parentesco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parentesco $parentesco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parentesco $parentesco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parentesco $parentesco)
    {
        //
    }
}
