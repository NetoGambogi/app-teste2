<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar clientes</title>
</head>
<body>
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

    <button type=submit>Salvar</button>

    </form>


</body>
</html>