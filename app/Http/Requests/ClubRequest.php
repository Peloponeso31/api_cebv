<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
