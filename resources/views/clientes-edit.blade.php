@extends('layouts.admin')

@section('content')

    <h1>Editar clientes</h1>
    <form action="{{route('clientes.update', $client->id )}}" method="POST">
        @csrf 
        @method('PUT')

    <label>Nome:</label>
    <input type="text" name="nome" value="{{ old('nome', $client->nome) }}" required>

    <label>Email:</label>
    <input type="text" name="email" value="{{ old('email', $client->email) }}" required>

    <label>Telefone:</label>
    <input type="text" name="telefone" value="{{ old('telefone', $client->telefone) }}" required>

    <button type=submit class="btn btn-success">Salvar</button>

    </form>

        <a href="{{ url('/clientes/') }}" class="btn btn-secondary">Voltar</a>


@endsection