<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use App\Models\Reportes\Area;

class AreaController extends Controller
{
    public function index()
    {
        return Area::all();
    }
}
