<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdemRequest extends FormRequest
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
            'titulo' => 'required|min:3',
            'descricao' => 'nullable',
            'status' => 'in:aberta,em_andamento,concluida|required',
            'cliente_id' => 'required|exists:clientes,id',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O campo título é obrigatório.',
            'titulo.min' => 'O título deve ter no mínimo 3 caracteres.',
            'status.required' => 'A ordem precisa ter um status.',
            'cliente_id' => 'A ordem precisa ter um responsável.',
        ];
    }
}
