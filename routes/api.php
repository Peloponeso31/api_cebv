<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return [Auth::user(), Auth::user()->tokens()];
});

Route::match(['get', 'post'], '/auth', function (Request $request) {
    try {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $token_name = $request->validate(['token_name' => ['required']])['token_name'];
    }
    catch (ValidationException $ex) {
        return response()->json([
            'estatus' => 'llamada incorrecta: '.$ex->getMessage()
        ], 400);
    }
    
    if (Auth::attempt($credentials)) {
        return Auth::user()->createToken($token_name);
    }
    else {
        return response()->json([
            'estatus' => 'usuario o contraseña incorrectos'
        ], 401);
    }
    
    return response()->json([
        'estatus' => 'autenticacion fallida'
    ], 406);
});

