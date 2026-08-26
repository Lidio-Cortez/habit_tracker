<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6|max:60'
        ];
    }
    public function messages(): array
    {
        return[
            'email.required' => 'O campo email é obrigatorio',
            'email.email' => 'O campo email deve ser um email válido',
            'password.required' => 'O campo password é obrigatoria', 
            'password.min' => 'O campo password deve ter no mínimo 6 caracteres', 
            'password.max' => 'O campo password deve ter no maxímo 60 caracteres', 
        ];
    }
}
