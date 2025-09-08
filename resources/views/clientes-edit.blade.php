@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Editar clientes</h1>
    <form action="{{route('clientes.update', $client->id )}}" method="POST">
        @csrf 
        @method('PUT')

<div class="d-flex justify-content-center">
    
    <div class="mb-3 ms-2">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" name="nome" value="{{ old('nome', $client->nome) }}" required>
        <span class="text-danger">{{ $errors->first('nome') }}</span>
    </div>

    <div class="mb-3 ms-2">
        <label for="email" class="form-label">Email:</label>
        <input type="text" class="form-control" name="email" value="{{ old('email', $client->email) }}" required>
        <span class="text-danger">{{ $errors->first('email') }}</span>
    </div>

    <div class="mb-3 ms-2">
        <label for="telefone" class="form-label">Telefone  (Somente números):</label>
        <input type="text" class="form-control" name="telefone" value="{{ old('telefone', $client->telefone) }}" required>
        <span class="text-danger">{{ $errors->first('telefone') }}</span>
    </div>
</div>

<div class="d-flex justify-content-center mt-3">

    <button type=submit class="btn btn-success">Salvar</button>
    <a href="{{ url('/clientes/') }}" class="btn btn-secondary">Voltar</a>
    
</div>
    </form>

@endsection