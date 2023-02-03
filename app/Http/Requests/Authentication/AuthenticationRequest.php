<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:255|required',
            'email' => 'email|max:255|required',
            'password' => 'string|required'
        ];
    }

    public function messages(): array
    {
        return [
            'string' => 'Esse campo recebe apenas string',
            'required' => 'Esse campo é obrigatório',
            'email' => 'O email não é válido',

            'name:max' => 'O nome deve conter no máximo 255 caracteres',
            'email:max' => 'O email deve conter no máximo de 255 caracteres'
        ];
    }
}
