@extends('layouts.admin')

@section('content')

    <h1 class="text-center mt-3">Chamado detalhado: </h1>

<x-alertas />    

    <div class="d-flex justify-content-center">
        <ul class="list-group">
        <li class="list-group-item"><b>Id: </b> {{$chamado->chamado_id}}</li>
        <li class="list-group-item"><b>Requerente: </b> {{$chamado->requerente?->name ?? 'Requerente apagado'}}</li>
        <li class="list-group-item"><b>Título: </b> {{$chamado->titulo}}</li>
        <li class="list-group-item"><b>Descrição: </b> {{$chamado->descricao}}</li>
        <li class="list-group-item"><b>Status: </b> {{$chamado->status}}</li>
        <li class="list-group-item"><b>Responsável: </b>  {{ $chamado->responsavel ? $chamado->responsavel->name : 'Não definido' }} </li>
        <li class="list-group-item"><b>Criado em: </b> {{ $chamado->created_at->format('d/m/Y H:i') }}</li>
        <li class="list-group-item"><b>Atualizado em: </b> {{ $chamado->updated_at->format('d/m/Y H:i') }}</li>
        </ul>
    </div>

    <div class="d-flex justify-content-center mt-3">    
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary me-2">Voltar</a>
        <a href="{{ route('admin.chamados.edit', $chamado->id) }}" class="btn btn-info me-2">Atualizar Status</a>
            
        <form action="{{ route('admin.chamados.destroy', $chamado->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('tem certeza que deseja apagar este chamado?')">Deletar</button>
    </div>

    </form>
    </div>


@endsection