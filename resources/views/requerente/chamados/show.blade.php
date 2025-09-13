@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Chamado detalhado: </h1>
    <div class="d-flex justify-content-center">
        <ul class="list-group">
        <li class="list-group-item"><b>Id: </b> {{$chamado->chamado_id}}</li>
        <li class="list-group-item"><b>Requerente: </b> {{$chamado->requerente->name}}</li>
        <li class="list-group-item"><b>Título: </b> {{$chamado->titulo}}</li>
        <li class="list-group-item"><b>Descrição: </b> {{$chamado->descricao}}</li>
        <li class="list-group-item"><b>Status: </b> {{$chamado->status}}</li>
        <li class="list-group-item"><b>Responsável: </b>  {{ $chamado->responsavel ? $chamado->responsavel->name : 'Aguardando...' }} </li>
        <li class="list-group-item"><b>Criado em: </b> {{ $chamado->created_at->format('d/m/Y H:i') }}</li>
        <li class="list-group-item"><b>Atualizado em: </b> {{ $chamado->updated_at->format('d/m/Y H:i') }}</li>
        </ul>
    </div>

    <div>
        <div class="images">
            @if($chamado->image)
                <p>Anexos:</p>
                <img src="{{ asset('img/ocorridos/requerente/' . $chamado->image) }}" alt="imagem">
            @else 
                <p>Esse chamado não tem anexos.</p>
            @endif
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">

        <a href="{{ route('requerente.chamados.edit', $chamado->id) }}" class="btn btn-info btn-primary me-2">Atualizar</a>

    <form action="{{ route('requerente.chamados.destroy', $chamado->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger me-2" onclick="return confirm('tem certeza que deseja apagar esta ordem?')">Deletar</button>
    </form>

        <a href="{{ route('requerente.dashboard') }}" class="btn btn-secondary">Voltar</a>

    </div>

<x-alertas /> <!-- Exibe mensagens de erro/sucesso -->

@endsection
</body>
</html>