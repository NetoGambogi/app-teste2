<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientesRequest extends FormRequest
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

        $client = $this->route('client');

        return [
            'nome' => 'required|min:3',
            'email' => [
                'required',
                'email',
                // Cria a regra 'unique' para a tabela 'clientes'.
                // O método ignore($client) diz ao validador para ignorar o ID deste cliente específico.
                // isso serve para o update funcionar corretamente.
                Rule::unique('clientes')->ignore($client),
            ],
            'telefone' => [
                'required',
                'digits_between:9,11',
                Rule::unique('clientes')->ignore($client),
            ],
        ];
    }

    public function messages(): array 
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O nome deve ter no mínimo 3 letras.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'É necessário um email válido.',
            'email.unique' => 'Esse email já está cadastrado.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.unique' => 'Esse telefone já está cadastrado.',
            'telefone.digits_between' => 'O telefone deve ter no mínimo 9 dígitos.'
        ];
    }
}
