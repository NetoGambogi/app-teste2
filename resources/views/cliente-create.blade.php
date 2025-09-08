@extends('layouts.admin')

@section('content')

<!-- Cadastro de novos clientes -->
    
<h1 class="text-center">Cadastrar um novo cliente </h1>

<form action="{{ route('clientes.store') }}" method="POST">
    @csrf

<div class="d-flex justify-content-center">
    <div class="mb-3 ms-2">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" required>
        <span class="text-danger">{{ $errors->first('nome') }}</span>
    </div>

    <div class="mb-3 ms-2">
        <label for="email" class="form-label">Email:</label>
        <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
        <span class="text-danger">{{ $errors->first('email') }}</span>
    </div>

    <div class="mb-3 ms-2">
        <label for="telefone" class="form-label">Telefone (Somente números):</label>
        <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" required>
        <span class="text-danger">{{ $errors->first('telefone') }}</span>
    </div>
</div>

<div class="d-flex justify-content-center">

    <button type=submit class="btn btn-success btn-primary me-4">Cadastrar</button>

</div>

</form>

@endsection