@extends('layouts.admin')

@section('content')

<x-alertas />

<h1 class="text-center mt-5">Editar usuário</h1>
    <form action="{{route('admin.usuarios.update', $user->id )}}" method="POST">
        @csrf 
        @method('PUT')

<div class="d-flex justify-content-center mt-4">

<div class="mb-3 me-2">
    <label for="name" class="form-label">Nome:</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
    <span class="text-danger">{{ $errors->first('name') }}</span>
</div>

<div class="mb-3 me-2">
    <label for="email" class="form-label">Email:</label>
    <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
    <span class="text-danger">{{ $errors->first('email') }}</span>
</div>

<!-- Precisa deixar pre-definido o valor antigo -->

    <label for="role">Tipo de usuário:</label>
    <ul>
        <li><input type="radio" name="role" id="requerente" value="requerente"
        {{ old('', $user->role ?? '') === 'requerente' ? 'checked' : '' }}>
            <label for="requerente">requerente</label></li>

        <li><input type="radio" name="role" id="responsavel" value="responsavel"
        {{ old('role', $user->role ?? '') === 'responsavel' ? 'checked' : '' }}>
            <label for="responsavel">responsavel</label></li>

        <li><input type="radio" name="role" id="admin" value="admin"
        {{ old('role', $user->role ?? '') === 'admin' ? 'checked' : '' }}>
            <label for="admin">admin</label></li>

        <span class="text-danger">{{ $errors->first('role') }}</span>
    </ul>

</div>

<div class="d-flex justify-content-center">
    <button type=submit class="btn btn-success btn-primary me-2">Salvar</button>
    <a href="{{ route('admin.usuarios.show', $user) }}" class="btn btn-secondary">Voltar</a>
</div>

</form>
    
@endsection
