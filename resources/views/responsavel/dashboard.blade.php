@extends('layouts.admin')

@section('content')

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="mb-3">Bem-vindo, {{ $responsavel->name }}</h1>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Aceitos</h5>
                    <p class="card-text display-6">{{ $totalAceitos }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Concluidos:</h5>
                    <p class="card-text display-6">{{ $totalConcluidos }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Em andamento:</h5>
                    <p class="card-text display-6">{{ $totalEmAndamento }}</p>
                </div>
            </div>
        </div>
</div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    Chamados em Andamento
                </div>
                <ul class="list-group list-group-flush">
                    @forelse($chamadosEmAndamento as $chamado)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $chamado->titulo }}</span>
                            <span class="badge bg-warning text-dark">{{ $chamado->status }}</span>
                        </li>
                    @empty
                        <li class="list-group-item">Nenhum chamado em andamento.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    Chamados Recentes
                </div>
                <ul class="list-group list-group-flush">
                    @forelse($chamadosRecentes as $chamado)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>{{ $chamado->titulo }}</strong><br>
                                    <small class="text-muted">Atualizado em {{ $chamado->updated_at->format('d/m/Y H:i') }}</small>
                                </div>
                                <span class="badge bg-secondary">{{ $chamado->status }}</span>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item">Nenhum chamado recente.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>



<div class="d-flex justify-content-center">
<a href="{{ route('responsavel.chamados.fila') }}" class="btn btn-success btn-primary me-4">Ver fila</a>
</div>


@endsection