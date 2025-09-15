<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusRequest extends FormRequest
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
            'status' => ['required', 'in:aberta,em_andamento,concluida,cancelada'],
            'image.*' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2064'],
        ];
    }

    public function messages(): array
    {
        return [
        'status.required' => 'O campo status é obrigatório.',

        'image.*.mimes' => 'Formato incompatível.',
        'image.*.max' => 'Seu arquivo é muito grande. Limite de 2 MB.',
        ];
    }
}
