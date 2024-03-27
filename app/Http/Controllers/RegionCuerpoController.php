<?php

namespace App\Http\Controllers;

use App\Models\Catalogos\RegionCuerpo;
use Illuminate\Http\Request;

class RegionCuerpoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RegionCuerpo::all();
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
    public function show(RegionCuerpo $regionCuerpo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegionCuerpo $regionCuerpo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegionCuerpo $regionCuerpo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegionCuerpo $regionCuerpo)
    {
        //
    }
}
