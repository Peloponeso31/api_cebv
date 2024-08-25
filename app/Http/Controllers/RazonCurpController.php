<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\RazonCurp;

class RazonCurpController extends Controller
{
    public function index() {
        return CatalogoResource::collection(RazonCurp::all());
    }
}
