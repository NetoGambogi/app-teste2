@extends('layouts.admin')

@section('content')
<h1>Seus chamados</h1>

<div class="d-flex justify-content-center mt-2">
    <ul class="list-group w-50">
        @foreach ($chamados as $chamado)
            <li class="list-group-item d-flex justify-content-between">
                {{$chamado->titulo}} - {{$chamado->descricao}}
            <a href="{{ route('requerente.chamados.show', $chamado) }}" class="btn btn-primary">Ver</a>
        </li>
    @endforeach
    </ul>
</div>

    <a href="{{ route('requerente.chamados.create') }}" class="btn btn-primary">
            Criar novo
    </a>


@endsection