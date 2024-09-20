<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniaTelefonicaRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            "nombre" => ['required','string','max:255'],
        ];
    }
}
