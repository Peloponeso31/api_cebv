<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Resources\ApiTokenResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function token(AuthRequest $request) {
        $email = $request->all()['email'];
        $password = $request->all()['password'];
        $token_name = $request->all()['token_name'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return new ApiTokenResource(Auth::user()->createToken($token_name));
        }

        return response()->json(["error" => "Usuario o contraseña invalidos."], 401);
    }
}
