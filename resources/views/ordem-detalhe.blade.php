@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Ordem detalhada: </h1>
    <div class="d-flex justify-content-center">
        <ul class="list-group">
        <li class="list-group-item"><b>Id: </b> {{$ordem->id}}</li>
        <li class="list-group-item"><b>Ordem: </b> {{$ordem->titulo}}</li>
        <li class="list-group-item"><b>Descrição: </b> {{$ordem->descricao}}</li>
        <li class="list-group-item"><b>Status: </b> {{$ordem->status}}</li>
        <li class="list-group-item"><b>Criado em: </b> {{ $ordem->created_at->format('d/m/Y H:i') }}</li>
        <li class="list-group-item"><b>Atualizado em: </b> {{ $ordem->updated_at->format('d/m/Y H:i') }}</li>
        </ul>
    </div>

    <div class="d-flex justify-content-center mt-3">

        <a href="{{ route('ordem.edit', $ordem->id) }}" class="btn btn-info btn-primary me-2">Atualizar</a>

    <form action="{{ route('ordem.destroy', $ordem->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('tem certeza que deseja apagar esta ordem?')">Deletar</button>
    </form>

    </div>

    <h2 class="text-center mt-3">Cliente responsável pela ordem:</h2>

<div class="d-flex justify-content-center mt-2">
<ul class="list-group">
    <li class="list-group-item"><b> ID: </b>  {{ $ordem->cliente->id }} </li>
    <li class="list-group-item"><b>Nome: </b> {{ $ordem->cliente->nome }} </li>
    <li class="list-group-item"><b>Email: </b> {{ $ordem->cliente->email }} </li>
</ul>
</div>

<div class="d-flex justify-content-center mt-3">
    <a href="{{ url('/ordens/') }}" class="btn btn-secondary">Voltar</a>
</div>

@endsection