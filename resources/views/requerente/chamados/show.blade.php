<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Chamado detalhado: </h1>
    <div class="d-flex justify-content-center">
        <ul class="list-group">
        <li class="list-group-item"><b>Id: </b> {{$chamado->id}}</li>
        <li class="list-group-item"><b>Título: </b> {{$chamado->titulo}}</li>
        <li class="list-group-item"><b>Descrição: </b> {{$chamado->descricao}}</li>
        <li class="list-group-item"><b>Status: </b> {{$chamado->status}}</li>
        <li class="list-group-item"><b>Responsável: </b>  {{ $chamado->responsavel ? $chamado->responsavel->name : 'Não definido' }} </li>
        <li class="list-group-item"><b>Criado em: </b> {{ $chamado->created_at->format('d/m/Y H:i') }}</li>
        <li class="list-group-item"><b>Atualizado em: </b> {{ $chamado->updated_at->format('d/m/Y H:i') }}</li>
        </ul>
    </div>

    <div class="d-flex justify-content-center mt-3">

        <a href="" class="btn btn-info btn-primary me-2">Atualizar</a>

    <form action="{{ route('requerente.chamados.destroy', $chamado->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('tem certeza que deseja apagar esta ordem?')">Deletar</button>
    </form>

    </div>

<x-alertas /> <!-- Exibe mensagens de erro/sucesso -->

@endsection
</body>
</html>