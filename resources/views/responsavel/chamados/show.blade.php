@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Chamado detalhado: </h1>
    <div class="d-flex justify-content-center">
        <ul class="list-group">
        <li class="list-group-item"><b>Id: </b> {{$chamado->id}}</li>
        <li class="list-group-item"><b>Requerente: </b> {{$chamado->requerente->name}}</li>
        <li class="list-group-item"><b>Título: </b> {{$chamado->titulo}}</li>
        <li class="list-group-item"><b>Descrição: </b> {{$chamado->descricao}}</li>
        <li class="list-group-item"><b>Status: </b> {{$chamado->status}}</li>
        <li class="list-group-item"><b>Responsável: </b>  {{ $chamado->responsavel ? $chamado->responsavel->name : 'Não definido' }} </li>
        <li class="list-group-item"><b>Criado em: </b> {{ $chamado->created_at->format('d/m/Y H:i') }}</li>
        <li class="list-group-item"><b>Atualizado em: </b> {{ $chamado->updated_at->format('d/m/Y H:i') }}</li>
        </ul>
    </div>

            <a href="{{ route('responsavel.dashboard') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('responsavel.chamados.edit', $chamado->id) }}" class="btn btn-info">Atualizar Status</a>
    </div>

@endsection