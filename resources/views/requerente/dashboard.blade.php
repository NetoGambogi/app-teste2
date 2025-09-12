@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="mb-3">Bem-vindo, {{ $requerente->name }}</h1>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-danger">Chamados na fila:</h5>
                    <p class="card-text display-6">{{ $chamadosNaFila }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-warning">Chamados em andamento:</h5>
                    <p class="card-text display-6">{{ $chamadosEmAndamento }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-success">Chamados Concluídos:</h5>
                    <p class="card-text display-6">{{ $chamadosConcluidos }}</p>
                </div>
            </div>
        </div>
</div>

 <div class="d-flex justify-content-center">
    <form action="{{ route('requerente.dashboard') }}">
        <label for="">Busque um chamado por id:</label>
        <input type="text" name="chamado_id" value="{{ request('chamado_id') }}">
        <button type="submit" class="btn btn-info">Filtrar</button>
    </form>
</div>   

<!-- Lista de chamados -->

<div class="d-flex justify-content-center mt-2">
    <ul class="list-group w-50">
        @foreach ($chamados as $chamado)
            <li class="list-group-item d-flex justify-content-between">
                {{$chamado->chamado_id}} - {{$chamado->titulo}} - {{$chamado->status}}
            <a href="{{ route('requerente.chamados.show', $chamado) }}" class="btn btn-primary">Ver</a>
        </li>
    @endforeach
    </ul>
</div>

    <div class="d-flex justify-content-center mt-3">
        {{ $chamados->links('pagination::bootstrap-5') }}
    </div>

<div class="d-flex justify-content-center mt-3">
    <a href="{{ route('requerente.chamados.create') }}" class="btn btn-primary">
            Novo chamado
    </a>
</div>


@endsection