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


<!-- Mensagem de sucesso -->

<div class="text-center">
    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif
</div>

<!-- Cadastro de novos clientes -->
    
<h2 class="text-center">Cadastrar um novo cliente </h2>

@if ($errors->any())
    <div style="color: red;">
        <ul> 
            @foreach ($errors->all() as $erro) 
            <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('clientes.store') }}" method="POST">
    @csrf

<div class="d-flex justify-content-center">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" required>
    </div>
</div>

<div class="d-flex justify-content-center">

    <button type=submit class="btn btn-success btn-primary me-4">Cadastrar</button>
    <a href="{{ url('/ordens/') }}" class="btn btn-info">Ver / Cadastrar ordens</a>

</div>

</form>

@endsection
