<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformacionConyugalController extends Controller
{
    private $default = [
        'tipo_estadocivil' => ['alpha:ascii']
    ];
}
