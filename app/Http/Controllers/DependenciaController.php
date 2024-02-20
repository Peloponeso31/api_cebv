<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;

class DependenciaController extends Controller
{
    public function index()
    {
        return Dependencia::all();
    }
}
