@extends('layouts.admin')

@section('content')

    <h1 class="text-center mt-2">Chamado detalhado: </h1>
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

    @if($chamado->image)
        <div class="text-center mt-3">
            <img src="{{ asset('/img/ocorridos/requerente/' . $chamado->image) }}" alt="Imagem do chamado" class="img-fluid rounded">
        </div>
    @endif

    </div>

<!-- Atualizar chamado -->

<div class="d-flex justify-content-center mt-3">
    <form action="{{route('responsavel.chamados.updateStatus', $chamado->id )}}" method="POST">
        @csrf 
        @method('PATCH')

    <label for="status">Status:</label>

            <input type="radio" name="status" id="concluida" value="concluida"
        {{ old('status', $chamado->status ?? '') === 'concluida' ? 'checked' : '' }}>
            <label for="Concluida">Concluída</label>

            <input type="radio" name="status" id="cancelada" value="cancelada"
        {{ old('status', $chamado->status ?? '') === 'cancelada' ? 'checked' : '' }}>
            <label for="Cancelada">Cancelada</label>

            <span class="text-danger">{{ $errors->first('status') }}</span>

<div class="d-flex justify-content-center mt-3">
    <button type=submit class="btn btn-success btn-success me-2">Atualizar Status</button>
    <a href="{{ route('responsavel.chamados.fila') }}" class="btn btn-secondary ">Voltar</a>
</div>
    </form>
</div>


@endsection