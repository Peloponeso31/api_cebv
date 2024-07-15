<?php

namespace App\Http\Controllers;

use App\Http\Resources\LenguaResource;
use App\Models\TiposDomicilio;
use Illuminate\Http\Request;

class TiposDomicilioController extends Controller
{
    public function index()
    {
        return LenguaResource::collection(TiposDomicilio::all());
    }
}
