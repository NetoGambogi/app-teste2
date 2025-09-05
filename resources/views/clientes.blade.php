@extends('layouts.admin')

@section('content')

<h1 class="text-center"> Lista de clientes </h1>

<div class="d-flex justify-content-center">
    <ul class="list-group w-50">
        @foreach ($clients as $client)
            <li class="list-group-item d-flex justify-content-between">
                {{$client->nome}} - {{$client->email}}
                <a href="{{ route('clientes.show', $client->id) }}" class="btn btn-primary">Ver</a>
        </li>
    @endforeach
    </ul>
</div>

<div class="text-center">
    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif
</div>
    
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
