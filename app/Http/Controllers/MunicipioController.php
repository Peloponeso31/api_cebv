<?php

namespace App\Http\Controllers;

use App\Models\Municipio;

class MunicipioController extends Controller
{
    public function index()
    {
        return Municipio::all();
    }
}
