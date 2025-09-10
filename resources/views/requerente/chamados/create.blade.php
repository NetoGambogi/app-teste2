@extends('layouts.admin')

@section('content')
        <h2>Abrir Novo Chamado</h2>


        <form action="{{ route('requerente.chamados.store') }}" method="POST">
            @csrf  

                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}">
            </div>

            <div class="form-floating">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" placeholder="Descreva seu problema" id="descricao" name="descricao">{{ old('descricao') }}</textarea>
            </div>

            <button type="submit">Enviar Chamado</button>
            <a href="{{ route('requerente.dashboard') }}">Cancelar</a>
        </form>
    </div>
@endsection
