@extends('layouts.admin')

@section('content')


<h1 class="text-center">Fila de chamados</h1>

<x-alertas />

@if($chamadosAbertos->isEmpty())

    <h2 class="text-center">Não há nenhum chamado na fila.</h2>

@else 

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Descricao</th>
                <th scope="col">Criado em</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chamadosAbertos as $chamado)
                <tr>
                    <td>{{ $chamado->titulo }}</td>
                    <td>{{ $chamado->descricao }}</td>
                    <td>{{ $chamado->created_at->format('d/m/Y H:i') }}</td>
                    <td>

                        <form action="{{ route('responsavel.chamados.aceitar', $chamado->id) }}" method='POST'>
                            @csrf 
                        <button type="submit" class="btn btn-success">Aceitar</button>
                        </form>
                    </td>                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endif 

<!-- Chamados aceitos -->

<h2 class="text-center">Chamados aceitos:</h2>

@if($chamadosAceitos->isEmpty())

    <h5 class="text-center">Você não tem nenhum chamado aceito.</h5>

@else 

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Descricao</th>
                <th scope="col">Ultima Atualização</th>
                <th scope="col">Detalhes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chamadosAceitos as $chamado)
                <tr>
                    <td>{{ $chamado->titulo }}</td>
                    <td>{{ $chamado->descricao }}</td>
                    <td>{{ $chamado->updated_at->format('d/m/Y H:i') }}</td>
                    <td><a href="{{ route('responsavel.chamados.show', $chamado->id) }}" class="btn btn-primary">Detalhes</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endif 


@endsection