<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function issue_token(AuthRequest $request) {
        $email = $request->all()['email'];
        $password = $request->all()['password'];
        $token_name = $request->all()['token_name'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return Auth::user()->createToken($token_name);
        }
    }
}
