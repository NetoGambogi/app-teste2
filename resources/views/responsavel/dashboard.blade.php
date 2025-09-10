@extends('layouts.admin')

@section('content')


<h1 class="text-center">Painel do responsável!</h1>

<div class="d-flex justify-content-center">
<a href="{{ route('responsavel.chamados.fila') }}" class="btn btn-success btn-primary me-4">Ver fila</a>
</div>


@endsection