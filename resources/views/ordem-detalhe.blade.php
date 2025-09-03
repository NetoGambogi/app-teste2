<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhe das ordens</title>
</head>
<body>

    <h1>Ordem detalhada: </h1>
    <div>
        <p><b>Ordem: </b> {{$ordem->titulo}}</p>
        <p><b>Descrição: </b> {{$ordem->descricao}}</p>
        <p><b>Status: </b> {{$ordem->status}}</p>
        <p><b>Criado em: </b> {{ $ordem->created_at->format('d/m/Y H:i') }} </p>
        <p><b>Atualizado em: </b> {{ $ordem->updated_at->format('d/m/Y H:i') }} </p>

        <a href="{{ route('ordem.edit', $ordem->id) }}">Atualizar</a>
    </div>

    <h2>Cliente responsável pela ordem:</h2>
    <p><b>Nome: </b> {{ $ordem->cliente->nome }} </p>
    <p><b>Email: </b> {{ $ordem->cliente->email }} </p>

    <a href="{{ url('/ordens/') }}">Voltar</a>
</body>
</html>