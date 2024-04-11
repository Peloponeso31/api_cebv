<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVelloFacialRequest extends FormRequest
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
        return [
            'persona_id'=>['required','integer'],
            'regionVellofacial_id'=>['required','integer'],
            'colorVellofacial_id'=>['required','integer'],
            'volumenVellofacial_id'=>['required','integer'],
            'corteVellofacial_id'=>['required','integer'],
            'modificacionVellofacial'=>['required','string']
        ];
    }
}
