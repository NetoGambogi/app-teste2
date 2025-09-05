@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Editar ordem</h1>
    <form action="{{route('ordem.update', $ordem->id )}}" method="POST">
        @csrf 
        @method('PUT')

<div class="d-flex justify-content-center">

<div class="mb-3">
    <label for="titulo" class="form-label">Título:</label>
    <input type="text" class="form-control" name="titulo" value="{{ old('titulo', $ordem->titulo) }}" required>
</div>

<div class="mb-3">
    <label for="descricao" class="form-label">Descrição:</label>
    <input type="text" class="form-control" name="descricao" value="{{ old('descricao', $ordem->descricao) }}" required>
</div>
    
<!-- Precisa deixar pre-definido o valor antigo -->

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
    <label class="form-label">Cliente:</label>
    <select class="form-select" name="cliente_id" required>
    <option value="">-- Selecione um cliente --</option>
    
    @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}" 
            {{ old('cliente_id', $ordem->cliente_id) == $cliente->id ? 'selected' : '' }}>
            {{ $cliente->nome }}
        </option>
    @endforeach

    </select>
</div>

</div>

<div class="d-flex justify-content-center">
    <button type=submit class="btn btn-success btn-primary me-2">Salvar</button>
    <a href="{{ url('/ordens/') }}" class="btn btn-secondary">Voltar</a>
</div>

    </form>



@endsection