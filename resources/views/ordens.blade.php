@extends('layouts.admin')

@section('content')

        <!-- Lista de ordens existentes -->

    <h1 class="text-center">Ordens Existentes</h1>
    <table>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Título</th>
      <th scope="col">Cliente</th>
      <th scope="col">Status</th>
      <th scope="col">Criada em</th>
        <th scope="col">Detalhes</th>
    </tr>
  </thead>
            @foreach($ordens as $ordem)
                <tr>
                    <td>{{ $ordem->titulo }}</td>
                    <td>{{ $ordem->cliente->nome }}</td>
                    <td>{{ ucfirst($ordem->status) }}</td>
                    <td>{{ $ordem->created_at->format('d/m/Y H:i') }}</td>
                    <td><a href="{{ route('ordem.show', $ordem->id) }}" class="btn btn-primary">Detalhes</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

        <h2 class="text-center">Cadastro de novas ordens</h2>

        <!-- Formulário para cadastro de novas ordens --->

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


    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-select" name="status" required>
            <option value="aberta">Aberta</option>
            <option value="em_andamento">Em Andamento</option>
            <option value="concluida">Concluída</option>
      </select>
    </div>

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
        <a href="{{ url('/clientes/') }}" class="btn btn-info">Ver / cadastrar clientes</a>
</div>
    </form>

    
@endsection