@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Ordens Existentes</h1>
    
<!-- Filtro de ordens -->

<div class="d-flex justify-content-center">
<form action="{{ route('ordens.index') }}" method="GET">
    <label for="status">Filtrar por status: </label>
    <select name="status" id="status" onchange="this.form.submit()">
    
    <option value="">Todos</option>  
    <option value="aberta" @selected(request('status') == 'aberta')>Aberta</option>
    <option value="em_andamento" @selected(request('status') == 'em_andamento')>Em andamento</option>
    <option value="concluida" @selected(request('status') == 'concluida')>Concluida</option>

    </select>
</form>
</div>

<x-alertas /> <!-- Exibe mensagens de erro/sucesso -->

<!-- Lista de ordens existentes -->

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

<div class="d-flex justify-content-center">
    {{ $ordens->links('pagination::bootstrap-5') }}
</div>

<div class="d-flex justify-content-center">
<a href="{{ route('ordens.create') }}" class="btn btn-success btn-primary me-4">Nova Ordem</a>
</div>

    
@endsection