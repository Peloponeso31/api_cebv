<?php

namespace App\Http\Controllers;

use App\Http\Resources\LenguaResource;
use App\Models\RazonesCurp;
use Illuminate\Http\Request;

class RazonesCurpController extends Controller
{
    public function index() {
        return LenguaResource::collection(RazonesCurp::all());
    }
}
