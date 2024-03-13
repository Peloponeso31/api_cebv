<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Todo mundo puede autenticarse.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Solo hace falta un usuario, contraseña y un nombre para el token para autenticarse.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
            'token_name' => ['required']
        ];
    }
}
