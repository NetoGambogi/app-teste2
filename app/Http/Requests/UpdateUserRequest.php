<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return auth()->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3',],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)],
            'role' => ['in:requerente,responsavel,admin', 'required',],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.min' => 'O nome precisa ter no mínimo 3 caracteres',

            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email precisa ser válido',

            'email.unique' => 'Esse email já está cadastrado.',
        ];
    }
}
