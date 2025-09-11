@extends('layouts.admin')

@section('content')

<h1 class="text-center">Chamados</h1>

<x-alertas />

<table class="table">
  <thead>
    <tr>
      <th scope="col">Título</th>
      <th scope="col">Requerente</th>
      <th scope="col">Status</th>
      <th scope="col">Atualizada em</th>
        <th scope="col">Detalhes</th>
    </tr>
  </thead>
            @foreach($chamados as $chamado)
                <tr>
                    <td>{{ $chamado->titulo }}</td>
                    <td>{{$chamado->requerente?->name ?? 'Requerente apagado'}}</td>
                    <td>{{ ucfirst($chamado->status) }}</td>
                    <td>{{ $chamado->updated_at->format('d/m/Y H:i') }}</td>
                    <td><a href="{{ route('admin.chamados.show', $chamado->id) }}" class="btn btn-primary">Detalhes</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

<div class="d-flex justify-content-center">
    {{ $chamados->links('pagination::bootstrap-5') }}
</div>

    <div class="d-flex justify-content-center mt-3">    
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary me-2">Voltar</a>
    </div>


@endsection