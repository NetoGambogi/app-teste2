@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Fila de chamados</h1>

    <x-alertas />

    <div class="row">
        <!-- Chamados abertos -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    Chamados na fila
                </div>
                <div class="card-body p-0">
                    @if($chamadosAbertos->isEmpty())
                        <h5 class="text-center p-3 mb-0">Não há nenhum chamado na fila.</h5>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Descrição</th>
                                        <th>Criado em</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($chamadosAbertos as $chamado)
                                        <tr>
                                            <td>{{ $chamado->titulo }}</td>
                                            <td>{{ $chamado->descricao }}</td>
                                            <td>{{ $chamado->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <form action="{{ route('responsavel.chamados.aceitar', $chamado->id) }}" method='POST'>
                                                    @csrf 
                                                    <button type="submit" class="btn btn-success btn-sm">Aceitar</button>
                                                </form>
                                            </td>                    
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Chamados aceitos -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    Chamados aceitos
                </div>
                <div class="card-body p-0">
                    @if($chamadosAceitos->isEmpty())
                        <h5 class="text-center p-3 mb-0">Você não tem nenhum chamado aceito.</h5>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Descrição</th>
                                        <th>Última Att</th>
                                        <th>Detalhes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($chamadosAceitos as $chamado)
                                        <tr>
                                            <td>{{ $chamado->titulo }}</td>
                                            <td>{{ $chamado->descricao }}</td>
                                            <td>{{ $chamado->updated_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <form action="{{ route('responsavel.chamados.retornar', $chamado->id) }}" method='POST'>
                                                    @csrf 
                                                    <button type="submit" class="btn btn-success btn-sm">Retornar a fila</button>
                                                </form>
                                                <a href="{{ route('responsavel.chamados.show', $chamado->id) }}" class="btn btn-primary btn-sm">Detalhes</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <a href="{{ route('responsavel.dashboard') }}" class="btn btn-secondary me-2">Voltar</a>
    </div>
</div>
@endsection