<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChamadosRequest extends FormRequest
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
            'titulo' => ['required', 'min:3', 'max:16'],
            'descricao' => ['required', 'max:64'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2064']
        ];
    }

public function messages(): array
    {
        return [
        'titulo.required' => 'O campo título é obrigatório.',
        'titulo.min' => 'O título deve ter no mínimo :min caracteres.',
        'titulo.max' => 'O título deve ter no máximo :max caracteres.',

        'descricao.required' => 'A descrição é obrigatória.',
        'descricao.max' => 'A descrição pode ter no máximo :max caracteres.',

        'image.mimes' => 'Formato incompatível.',
        'image.max' => 'Seu arquivo é muito grande. Limite de 2 MB.',

        ];
    }
}
