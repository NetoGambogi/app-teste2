@extends('layouts.admin')

@section('content')

<!-- Cadastro de novos clientes -->
    
<h1 class="text-center">Cadastrar um novo cliente </h1>

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

</div>

</form>

@endsection