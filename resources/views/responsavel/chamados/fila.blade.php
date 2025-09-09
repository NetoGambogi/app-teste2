@extends('layouts.admin')

@section('content')


<h1>teste da fila</h1>

<h2>chamados abertos:</h2>

<x-alertas />

@if($chamadosAbertos->isEmpty())

    <p>Não há chamados abertos disponiveis no momento.</p>

@else 

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descricao</th>
                <th>Criado em</th>
                <th>Ações</th>
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

<h2>Chamados aceitos:</h2>

@if($chamadosAceitos->isEmpty())

    <p>Você não tem nenhum chamado aceito.</p>

@else 

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descricao</th>
                <th>Ultima Atualização</th>
                <th>Detalhes</th>
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