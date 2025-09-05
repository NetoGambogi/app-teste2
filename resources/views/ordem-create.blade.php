@extends('layouts.admin')

@section('content')

        <!-- Formulário para cadastro de novas ordens --->

        <h1 class="text-center">Cadastro de novas ordens</h1>

    <form method="POST" action="{{ route('ordens.store') }}">
        @csrf

    <div class="d-flex justify-content-center">

        <div class="mb-3">
            <label for="TextInput" class="form-label">Título</label>
            <input type="text" id="titulo" class="form-control" name="titulo" value="{{ old('titulo') }}" required>
        </div>


        <div class="mb-3">
            <label for="TextInput" class="form-label">Descrição</label>
            <input type="text" id="descricao" class="form-control" name="descricao" value="{{ old('descricao') }}" required>
        </div>

    <label for="status">Status:</label>
    <ul>
        <li><input type="radio" name="status" id="aberta" value="aberta">
            <label for="aberta">Aberta</label></li>
        <li><input type="radio" name="status" id="em_andamento" value="em_andamento">
            <label for="em_andamento">Em andamento</label></li>
        <li><input type="radio" name="status" id="concluida" value="concluida">
            <label for="concluida">Concluída</label></li>
    </ul>
    
    <div class="mb-3">
      <label for="cliente_id" class="form-label">Cliente</label>
      <select id="cliente_id" name="cliente_id" class="form-select">
            <option value="">-- Selecione um cliente --</option>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
            @endforeach
      </select>
    </div>
</div>

<div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success btn-primary me-4">Criar Ordem</button>
</div>
    </form>

@endsection