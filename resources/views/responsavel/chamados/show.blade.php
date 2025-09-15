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

    </div>

    <div class="d-flex justify-content-center">
        <div class="images">
            @if($chamado->imagens->count())
                <p>Anexos:</p>
                <div class="d-flex flex-wrap">
                    @foreach($chamado->imagens as $imagem)
                        <img src="{{ asset('storage/img/ocorridos/requerente/' . $imagem->nome_img) }}" 
                            alt="imagem"
                            style="width: 150px; height: auto; margin-right: 5px;">
                    @endforeach 
                </div>     
            @else 
                <p>Esse chamado não tem anexos.</p>
            @endif
        </div>
    </div>

<!-- Atualizar chamado -->

<div class="d-flex justify-content-center mt-3">
    <form action="{{route('responsavel.chamados.updateStatus', $chamado->id )}}" method="POST" enctype="multipart/form-data">
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
        
        <div class="mb-3 mt-2">
                <input type="file" id="image" name="image[]" multiple class="form-control">

            <label for="image" class="form-label">Imagem do ocorrido 
                <small>(Formatos: jpg, jpeg, png - Tamanho maximo: 2mb)</small>
            </label>
                <span class="text-danger">{{ $errors->first('image.*') }}</span>
        </div>

<div class="d-flex justify-content-center mt-3">
    <button type=submit class="btn btn-success btn-success me-2">Atualizar Status</button>
    <a href="{{ route('responsavel.chamados.fila') }}" class="btn btn-secondary ">Voltar</a>
</div>
    </form>
</div>


@endsection