<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'cognome' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:60|confirmed',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'il nome è obbligatorio.',
            'name.string' => 'il nome non deve contenere numeri.',
            'name.max' => 'il nome deve avere un massimo di :max caratteri.',

            'cognome.required' => 'il cognome è obbligatorio.',
            'cognome.string' => 'il cognome non deve contenere numeri.',
            'cognome.max' => 'il cognome deve avere un massimo di :max caratteri.',
            'email.required' => ' L\'email è obbligatoria.',
            'email.email' => ' Il formato dell\'email non è valido.',
            'email.unique' => ' L\'email è già in uso.',

            'password.required' => ' La password è obbligatoria.',
            'password.min' => 'La password deve contenere un minimo di :min caratteri.',
            'password.max' => 'La password deve contenere un massimo di :max caratteri.',
            'password.confirmed' => 'La conferma della password non corrisponde.',

        ];
    }
}
