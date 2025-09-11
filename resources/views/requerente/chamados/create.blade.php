@extends('layouts.admin')

@section('content')
        <h2 class="text-center mt-5">Abrir Novo Chamado</h2>


        <form action="{{ route('requerente.chamados.store') }}" method="POST">
            @csrf  

        <div class="d-flex justify-content-center mt-4">

        <div class="mb-3 me-2">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" id="titulo" class="form-control" placeholder="Título do chamado" name="titulo" value="{{ old('titulo') }}">
                <span class="text-danger">{{ $errors->first('titulo') }}</span>
        </div>

        <div class="mb-3">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" placeholder="Descreva seu problema" id="descricao" name="descricao">{{ old('descricao') }}</textarea>
                <span class="text-danger">{{ $errors->first('descricao') }}</span>
        </div>

        </div>

    <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-success me-3">Enviar Chamado</button>
            <a href="{{ route('requerente.dashboard') }}" class="btn btn-secondary">Cancelar</a>
    </div>
        </form>
    </div>
@endsection
