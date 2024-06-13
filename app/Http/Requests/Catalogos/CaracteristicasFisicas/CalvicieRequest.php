<?php

namespace App\Http\Requests\Catalogos\CaracteristicasFisicas;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CalvicieRequest extends FormRequest
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
                'Calvicie'=>['nullable', Rule::in(['Sí', 'No'])],
             ];
        } else {
            return [
                'Calvicie'=>['sometimes','nullable', Rule::in(['Sí', 'No'])],
            ];
        }
    }
}
