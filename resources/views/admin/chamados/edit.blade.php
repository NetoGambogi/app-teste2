@extends('layouts.admin')

@section('content')

<x-alertas />

    <h1 class="text-center">Editar ordem</h1>
    <form action="{{route('admin.chamados.update', $chamado->id )}}" method="POST">
        @csrf 
        @method('PUT')

<div class="d-flex justify-content-center">

<div class="mb-3">
    <label class="form-label">Requerente:</label>
    <select class="form-select" name="requerente_id" required>
    <option value="">Selecione um requerente</option>
    
    @foreach($requerentes as $user)
        <option value="{{ $user->id }}" 
            {{ old('requerente_id', $chamado->requerente_id) == $user->id ? 'selected' : '' }}>
            {{ $user->name }}
        </option>
    @endforeach

    </select>
    <span class="text-danger">{{ $errors->first('requerente_id') }}</span>
</div>

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

<div class="mb-3">
    <label class="form-label">Responsável:</label>
    <select class="form-select" name="responsavel_id" required>
    <option value="">Selecione um responsável</option>
    
    @foreach($responsaveis as $user)
        <option value="{{ $user->id }}" 
            {{ old('responsavel_id', $chamado->responsavel_id) == $user->id ? 'selected' : '' }}>
            {{ $user->name }}
        </option>
    @endforeach

    </select>
    <span class="text-danger">{{ $errors->first('responsaveis_id') }}</span>
</div>

    <label for="status">Status:</label>
    <ul>
        
        <li><input type="radio" name="status" id="aberta" value="aberta"
        {{ old('status', $chamado->status ?? '') === 'aberta' ? 'checked' : '' }}>
            <label for="Aberta">Aberta</label></li>

            <li><input type="radio" name="status" id="em_andamento" value="em_andamento"
        {{ old('status', $chamado->status ?? '') === 'em_andamento' ? 'checked' : '' }}>
            <label for="Em andamento">Em andamento</label></li>

            <li><input type="radio" name="status" id="concluida" value="concluida"
        {{ old('status', $chamado->status ?? '') === 'concluida' ? 'checked' : '' }}>
            <label for="Concluida">Concluída</label></li>

            <li><input type="radio" name="status" id="cancelada" value="cancelada"
        {{ old('status', $chamado->status ?? '') === 'cancelada' ? 'checked' : '' }}>
            <label for="Cancelada">Cancelada</label></li>

        <span class="text-danger">{{ $errors->first('status') }}</span>
    </ul>

</div>

<div class="d-flex justify-content-center mt-3">
    <button type=submit class="btn btn-success btn-primary me-2">Salvar</button>
    <a href="{{ route('admin.chamados.show', $chamado) }}" class="btn btn-secondary">Voltar</a>
</div>

</form>

@endsection