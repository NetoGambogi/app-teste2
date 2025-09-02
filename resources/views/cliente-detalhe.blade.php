<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Clientes detalhados:</h1>
    <p><b>Nome: </b> {{$client->nome}} </p>
    <p><b>Email: </b> {{$client->email}} </p>
    <p><b>Telefone: </b> {{$client->telefone}} </p>

    <a href="{{ url('/clientes/') }}">Voltar</a>
</body>
</html>