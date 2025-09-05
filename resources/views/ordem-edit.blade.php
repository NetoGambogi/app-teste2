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

<div class="mb-3">
    <label for="status" class="form-label">Status:</label>
    <input type="text" class="form-control" name="status" value="{{ old('status', $ordem->status) }}" required>
</div>
    
    <!-- <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-select" name="status" required>
            <option value="aberta">Aberta</option>
            <option value="em_andamento">Em Andamento</option>
            <option value="concluida">Concluída</option>
      </select>
    </div> -->


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