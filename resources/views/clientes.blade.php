<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de clientes</title>
</head>
<body>

<h1> Lista de clientes </h1>

    <ul>
        @foreach ($clients as $client)
            <li>
                {{$client->nome}} - {{$client->email}}
                <a href="{{ route('clientes.show', $client->id) }}">Ver</a>

        @can ('delete-client')
            <form action="{{ url('/client/' . $client->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Deletar</button>
        </form>
        @endcan
        </li>
    @endforeach
    </ul>
    
<h2>Cadastrar um novo cliente </h2>

@if ($errors->any())
    <div style="color: red;">
        <ul> 
            @foreach ($errors->all() as $erro) 
            <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('clientes.store') }}" method="POST">
    @csrf
    
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="{{ old('nome') }}" required><br><br>

    <label for="email">Email:</label>
    <input type="text" name="email" value="{{ old('email') }}" required><br><br>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" value="{{ old('telefone') }}" required><br><br>

    <button type=submit>Cadastrar</button>

    <a href="{{ url('/ordens/') }}">Ver / Cadastrar ordens</a>
</form>
</body>
</html>