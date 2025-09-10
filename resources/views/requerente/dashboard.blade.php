@extends('layouts.admin')

@section('content')
<h1 class="text-center">Seus chamados</h1>

<div class="d-flex justify-content-center mt-2">
    <ul class="list-group w-50">
        @foreach ($chamados as $chamado)
            <li class="list-group-item d-flex justify-content-between">
                {{$chamado->titulo}} - Status: {{$chamado->status}}
            <a href="{{ route('requerente.chamados.show', $chamado) }}" class="btn btn-primary">Ver</a>
        </li>
    @endforeach
    </ul>
</div>

<div class="d-flex justify-content-center mt-3">
    <a href="{{ route('requerente.chamados.create') }}" class="btn btn-primary">
            Novo chamado
    </a>
</div>


@endsection