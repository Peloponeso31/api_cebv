<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\TiposDomicilio;

class TiposDomicilioController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(TiposDomicilio::all());
    }
}
