@extends('layouts.admin')

@section('content')

<h1 class="text-center">Chamados</h1>

<div class="container mt-4">

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title text-primary">Total de chamados</h5>
                    <p class="card-text display-6">{{ $totalChamados }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title text-success">Chamados na fila</h5>
                    <p class="card-text display-6">{{ $chamadosFila }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title text-warning">Chamados concluídos</h5>
                    <p class="card-text display-6">{{ $chamadosConcluido }}</p>
                </div>
            </div>
        </div>
</div>

 <div class="d-flex justify-content-center">
    <form action="{{ route('admin.chamados.index') }}">
        <label for="">Busque um chamado por id:</label>
        <input type="text" name="chamado_id" value="{{ request('chamado_id') }}">

    <select name="status" id="status">
        <option value="">Selecione o status</option>
        <option value="aberta" {{request('status') == 'aberta' ? 'selected' : ''}}>Aberta</option>
        <option value="em_andamento" {{request('status') == 'em_andamento' ? 'selected' : ''}}>Em andamento</option>
        <option value="concluida" {{request('status') == 'concluida' ? 'selected' : ''}}>Concluída</option>
        <option value="cancelada" {{request('status') == 'cancelada' ? 'selected' : ''}}>Cancelada</option>
    </select>

    <button type="submit" class="btn btn-info">Filtrar</button>


    </form>
</div>   


<x-alertas />

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Título</th>
      <th scope="col">Requerente</th>
      <th scope="col">Status</th>
      <th scope="col">Atualizada em</th>
        <th scope="col">Detalhes</th>
    </tr>
  </thead>
            @foreach($chamados as $chamado)
                <tr>
                    <td>{{ $chamado->chamado_id }}</td>
                    <td>{{ $chamado->titulo }}</td>
                    <td>{{$chamado->requerente?->name ?? 'Requerente apagado'}}</td>
                    <td>{{ ucfirst($chamado->status) }}</td>
                    <td>{{ $chamado->updated_at->format('d/m/Y H:i') }}</td>
                    <td><a href="{{ route('admin.chamados.show', $chamado->id) }}" class="btn btn-primary">Detalhes</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

<div class="d-flex justify-content-center">
    {{ $chamados->links('pagination::bootstrap-5') }}
</div>

    <div class="d-flex justify-content-center mt-3">    
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary me-2">Voltar</a>
    </div>


@endsection