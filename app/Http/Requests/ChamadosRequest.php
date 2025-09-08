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
            'requerente_id' => ['required', 'exists:users,id'],
            'titulo' => ['required', 'min:3',],
            'descricao' => ['nullable',],
            'status' => ['required', 'in:aberta,em_andamento,concluida',],
            'data_conclusao' => ['date'],
        ];
    }
}

public function messages(): array
    {
        return [
        'requerente_id.required' => 'Você precisa selecionar o requerente do chamado.',
        'requerente_id.exists' => 'O requerente selecionado não existe ou é inválido.',

        'titulo.required' => 'O campo título é obrigatório.',
        'titulo.min' => 'O título deve ter no mínimo :min caracteres.',

        'status.required' => 'O campo status é obrigatório.',
        'status.in' => 'Por favor, selecione um status válido (Aberta, Em Andamento ou Concluída).',

        'data_conclusao.date' => 'O campo data de conclusão deve conter uma data válida.',
        ]
    }
