@extends('layouts.admin')

@section('content')

<h1 class="text-center">Editar ordem</h1>
    <form action="{{route('requerente.chamados.update', $chamado->id )}}" method="POST">
        @csrf 
        @method('PUT')

<div class="d-flex justify-content-center">

<div class="mb-3">
    <label for="titulo" class="form-label">Título:</label>
    <input type="text" class="form-control" name="titulo" value="{{ old('titulo', $chamado->titulo) }}" required>
    <span class="text-danger">{{ $errors->first('titulo') }}</span>
</div>

<div class="mb-3">
    <label for="descricao" class="form-label">Descrição:</label>
    <input type="text" class="form-control" name="descricao" value="{{ old('descricao', $chamado->descricao) }}" required>
    <span class="text-danger">{{ $errors->first('descricao') }}</span>
</div>

</div>

<div class="d-flex justify-content-center">
    <button type=submit class="btn btn-success btn-primary me-2">Salvar</button>
    <a href="{{ route('requerente.chamados.show', $chamado) }}" class="btn btn-secondary">Voltar</a>
</div>

</form>
    
@endsection
