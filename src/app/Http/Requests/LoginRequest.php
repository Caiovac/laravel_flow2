<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6|max:60',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'L\'email è obbligatoria.',
            'email.email' => 'Il formato dell\'email non è valido.',
            'password.required' => 'La password è obbligatoria.',
            'password.min' => 'La password deve essere almeno di :min caratteri.',
            'password.max' => 'La password non può superare i :max caratteri.',
        ];
    }
}
