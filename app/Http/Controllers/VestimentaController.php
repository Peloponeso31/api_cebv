<?php

namespace App\Http\Controllers;

use App\Models\Catalogos\Vestimenta;
use Illuminate\Http\Request;

class VestimentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Vestimenta::all();
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
    public function show(Vestimenta $vestimenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vestimenta $vestimenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vestimenta $vestimenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vestimenta $vestimenta)
    {
        //
    }
}
