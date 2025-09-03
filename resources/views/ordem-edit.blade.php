<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar ordem</title>
</head>
<body>

    <h1>Editar ordem</h1>
    <form action="{{route('ordem.update', $ordem->id )}}" method="POST">
        @csrf 
        @method('PUT')

    <label>Título:</label>
    <input type="text" name="titulo" value="{{ old('titulo', $ordem->titulo) }}" required>

    <label>Descrição:</label>
    <input type="text" name="descricao" value="{{ old('descricao', $ordem->descricao) }}" required>

    <label>Status:</label>
    <input type="text" name="status" value="{{ old('status', $ordem->status) }}" required>

    <label>Cliente:</label>
    <select name="cliente_id" required>
    <option value="">-- Selecione um cliente --</option>
    
    @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}" 
            {{ old('cliente_id', $ordem->cliente_id) == $cliente->id ? 'selected' : '' }}>
            {{ $cliente->nome }}
        </option>
    @endforeach

    </select>

    <button type=submit>Salvar</button>

    </form>

</body>
</html>