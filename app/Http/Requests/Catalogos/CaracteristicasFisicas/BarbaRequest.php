<?php

namespace App\Http\Requests\Catalogos\CaracteristicasFisicas;

use Illuminate\Foundation\Http\FormRequest;

class BarbaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($method == 'PUT') {
             return [
                'Barba'=>['nullable', Rule::in(['Sí', 'No', 'No especifico'])],
             ];
        } else {
            return [
                'Barba'=>['sometimes','nullable', Rule::in(['Sí', 'No', 'No especifico'])],
            ];
        }
    }
}
