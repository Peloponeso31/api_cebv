<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function issue_token(Request $request) {
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
    }
}
