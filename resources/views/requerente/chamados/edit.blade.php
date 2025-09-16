@extends('layouts.admin')

@section('content')

<h1 class="text-center">Editar chamado</h1>

<x-alertas />   

    <form action="{{route('requerente.chamados.update', $chamado->id )}}" method="POST">
        @csrf 
        @method('PUT')

<div class="d-flex justify-content-center">

<div class="mb-3 me-2">
    <label for="titulo" class="form-label">Título:</label>
    <input type="text" class="form-control" name="titulo" value="{{ old('titulo', $chamado->titulo) }}" required>
    <span class="text-danger">{{ $errors->first('titulo') }}</span>
</div>

<div class="mb-3">
    <label for="descricao" class="form-label">Descrição:</label>
    <input type="text" class="form-control" name="descricao" value="{{ old('descricao', $chamado->descricao) }}" required>
    <span class="text-danger">{{ $errors->first('descricao') }}</span>
</div>

</div>

<div class="d-flex justify-content-center">
    <button type=submit class="btn btn-success btn-primary me-2">Salvar</button>
    <a href="{{ route('requerente.chamados.show', $chamado) }}" class="btn btn-secondary">Voltar</a>
</div>

</form>

<div class="container mt-3">
    <div class="row justify-content-center gy-4">
        @foreach($chamado->imagens as $imagem)
            <div class="col-md-4 col-lg-3">
                <div class="card shadow-sm h-100 text-center">
                    <img src="{{ asset('storage/img/ocorridos/requerente/' . $imagem->nome_img) }}" 
                         class="card-img-top img-fluid" 
                         alt="Imagem do chamado"
                         style="height:180px; object-fit:cover;">

                    <div class="card-body p-2">

                        <form action="{{ route('requerente.imagens.destroy', $imagem->id) }}" 
                              method="POST" 
                              class="mb-2"
                              onsubmit="return confirm('Tem certeza que deseja remover esta imagem?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100">
                                 Remover
                            </button>
                        </form>


                        <form action="{{ route('requerente.imagens.replace', $imagem->id) }}" 
                              method="POST" 
                              enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <input type="file" name="image" class="form-control form-control-sm" required>
                            </div>
                            <button type="submit" class="btn btn-warning btn-sm w-100">
                                 Substituir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

            <div class="d-flex justify-content-center my-4">
                <div class="card shadow-sm text-center" style="width: 250px;">
                    <div class="card-body p-3">
                        <h6 class="mb-3">Adicionar nova imagem</h6>
                        <form action="{{ route('requerente.imagens.store', $chamado->id) }}" 
                            method="POST" 
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="file" name="image" class="form-control form-control-sm" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm w-100">
                                 Adicionar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            


@endsection
