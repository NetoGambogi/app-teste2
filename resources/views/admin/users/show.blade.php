@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Cliente detalhado:</h1>

    <div class="d-flex justify-content-center">
        <ul class="list-group">
            <li class="list-group-item"><b>ID: </b> {{$user->id}} </li>
            <li class="list-group-item"><b>Nome: </b> {{$user->name}} </li>
            <li class="list-group-item"><b>Email: </b> {{$user->email}} </li>
            <li class="list-group-item"><b>Cargo: </b> {{$user->role}} </li>
            <li class="list-group-item"><b>Criado em: </b> {{ $user->created_at->format('d/m/Y H:i') }} </li>
            <li class="list-group-item"><b>Atualizado em: </b> {{ $user->updated_at->format('d/m/Y H:i') }} </li>
        </ul>
    </div>

<div class="d-flex justify-content-center mt-3">
    <a href="{{ route('admin.usuarios.edit', $user->id) }}" class="btn btn-info btn-primary me-2">Atualizar</a>

    <form action="{{ route('admin.usuarios.destroy', $user->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('tem certeza que deseja apagar este cliente?')">Deletar</button>
    </form>
</div>

<x-alertas /> <!-- Exibe mensagens de erro/sucesso -->

    <h2 class="text-center">Chamados do funcionário: </h2>
@if ($chamado)
    <div class="d-flex justify-content-center">
    <ul class="list-group">
        <li class="list-group-item"><b>ID: </b> {{$chamado->id}}</p>
        <li class="list-group-item"><b>Ordem: </b> {{$chamado->titulo}}</p>
        <li class="list-group-item"><b>Descrição: </b> {{$chamado->descricao}}</p>
        <li class="list-group-item"><b>Status: </b> {{$chamado->status}}</p>
    </ul>
    </div>
@else
    <p class="text-center">Esse usuário não possui ordens.</p>
@endif

<div class="d-flex justify-content-center mt-3">
    <a href="{{ url('/admin/usuarios') }}" class="btn btn-secondary">Voltar</a>
</div>


@endsection