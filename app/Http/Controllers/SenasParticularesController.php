<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSenasParticularesRequest;
use App\Http\Resources\SenasParticularesResource;
use App\Models\SenasParticulares;
use Illuminate\Http\Request;

class SenasParticularesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:buscar') ->only('index', 'show');
        $this->middleware('can:creacion') ->only('store');
        $this->middleware('can:edicion') ->only('update');
        $this->middleware('can:eliminacion') ->only('destroy');  
    }
    
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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSenasParticularesRequest $request)
    {
        return new SenasParticularesResource(SenasParticulares::create($request->all()));
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
