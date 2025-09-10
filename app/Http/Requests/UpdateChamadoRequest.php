<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChamadoRequest extends FormRequest
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
            'titulo' => ['required', 'min:3',],
            'requerente_id' => ['required'],
            'responsavel_id' => ['nullable'],
            'descricao' => ['required',],
            'status' => ['required', 'in:aberta,em_andamento,concluida,cancelada'],
            'data_conclusao' => ['nullable', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
        'requerente_id.required' => 'Você precisa selecionar o requerente do chamado.',

        'titulo.required' => 'O campo título é obrigatório.',
        'titulo.min' => 'O título deve ter no mínimo :min caracteres.',

        'descricao.required' => 'A descrição é obrigatória.',

        'status.required' => 'O campo status é obrigatório.',
        'status.in' => 'Por favor, selecione um status válido (Aberta, Em Andamento ou Concluída).',

        'data_conclusao.date' => 'O campo data de conclusão deve conter uma data válida.',
        ];
    }
}
