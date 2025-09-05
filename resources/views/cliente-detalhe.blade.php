@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Cliente detalhado:</h1>

    <div class="d-flex justify-content-center">
        <ul class="list-group">
            <li class="list-group-item"><b>ID: </b> {{$client->id}} </li>
            <li class="list-group-item"><b>Nome: </b> {{$client->nome}} </li>
            <li class="list-group-item"><b>Email: </b> {{$client->email}} </li>
            <li class="list-group-item"><b>Telefone: </b> {{$client->telefone}} </li>
            <li class="list-group-item"><b>Criado em: </b> {{ $client->created_at->format('d/m/Y H:i') }} </li>
            <li class="list-group-item"><b>Atualizado em: </b> {{ $client->updated_at->format('d/m/Y H:i') }} </li>
        </ul>
    </div>

<div class="d-flex justify-content-center mt-3">
    <a href="{{ route('clientes.edit', $client->id) }}" class="btn btn-info btn-primary me-2">Atualizar</a>

    <form action="{{ route('clientes.destroy', $client->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('tem certeza que deseja apagar este cliente?')">Deletar</button>
    </form>
</div>

    <h2 class="text-center">Ordem do cliente: </h2>
@if ($ordem)
    <div class="d-flex justify-content-center">
    <ul class="list-group">
        <li class="list-group-item"><b>ID: </b> {{$ordem->id}}</p>
        <li class="list-group-item"><b>Ordem: </b> {{$ordem->titulo}}</p>
        <li class="list-group-item"><b>Descrição: </b> {{$ordem->descricao}}</p>
        <li class="list-group-item"><b>Status: </b> {{$ordem->status}}</p>
    </ul>
    </div>
@else
    <p class="text-center">Esse usuário não possui ordens.</p>
@endif

<div class="d-flex justify-content-center mt-3">
    <a href="{{ url('/clientes/') }}" class="btn btn-secondary">Voltar</a>
</div>

@endsection