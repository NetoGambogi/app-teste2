@extends('layouts.admin')

@section('content')

<h1 class="text-center"> Lista de clientes </h1>

<!-- Filtro de clientes por nome -->

<div class="d-flex justify-content-center">
    <form action="{{ route('clientes.index') }}">
        <label for="">Busque um cliente por nome:</label>
        <input type="text" name="nome" value="{{ request('nome') }}">
        <button type="submit" class="btn btn-info">Filtrar</button>
    </form>
</div>

<x-alertas /> <!-- Exibe mensagens de erro/sucesso -->

<!-- Lista de clientes, 10 por página -->

<div class="d-flex justify-content-center mt-2">
    <ul class="list-group w-50">
        @foreach ($clients as $client)
            <li class="list-group-item d-flex justify-content-between">
                {{$client->nome}} - {{$client->email}}
                <a href="{{ route('clientes.show', $client->id) }}" class="btn btn-primary">Ver</a>
        </li>
    @endforeach
    </ul>
</div>

<div class="d-flex justify-content-center">
    {{ $clients->links('pagination::bootstrap-5') }}
</div>


<div class="d-flex justify-content-center">
<a href="{{ route('clientes.create') }}" class="btn btn-success btn-primary me-4">Novo Cliente</a>
</div>

@endsection
