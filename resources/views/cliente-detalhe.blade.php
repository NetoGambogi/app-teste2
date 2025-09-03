<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhe do cliente</title>
</head>
<body>
    <h1>Cliente detalhado:</h1>
    <p><b>Nome: </b> {{$client->nome}} </p>
    <p><b>Email: </b> {{$client->email}} </p>
    <p><b>Telefone: </b> {{$client->telefone}} </p>
    <p><b>Criado em: </b> {{ $client->created_at->format('d/m/Y H:i') }} </p>
    <p><b>Atualizado em: </b> {{ $client->updated_at->format('d/m/Y H:i') }} </p>

    <a href="{{ route('clientes.edit', $client->id) }}">Atualizar</a>

    <h2>Ordem do cliente: </h2>
@if ($ordem)
    <div>
        <p><b>Ordem: </b> {{$ordem->titulo}}</p>
        <p><b>Descrição: </b> {{$ordem->descricao}}</p>
        <p><b>Status: </b> {{$ordem->status}}</p>
    </div>
@else
    <p>Esse usuário não possui ordens.</p>
@endif
    <a href="{{ url('/clientes/') }}">Voltar</a>
</body>
</html>