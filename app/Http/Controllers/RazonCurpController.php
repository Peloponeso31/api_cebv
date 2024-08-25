<?php

namespace App\Http\Controllers;

use App\Http\Resources\LenguaResource;
use App\Models\RazonCurp;

class RazonCurpController extends Controller
{
    public function index() {
        return LenguaResource::collection(RazonCurp::all());
    }
}
