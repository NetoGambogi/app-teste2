<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Ordens de Serviço</h1>

        <!-- Formulário para cadastro de novas ordens --->
    <form method="POST" action="{{ route('ordens.store') }}">
        @csrf

        <div>
            <label for="titulo">Título</label>
            <input type="text" required minlength="3">
        </div>

        <div>
            <label for="descricao">Descrição</label>
            <textarea id="descricao"></textarea>
        </div>

        <div>
            <label>Status</label>
            <select>
                <option value="aberta">Aberta</option>
                <option value="em_andamento">Em Andamento</option>
                <option value="concluida">Concluída</option>
            </select>
        </div>

        <div>
            <label for="cliente_id">Cliente</label>
            <select id="cliente_id" name="cliente_id" required>
                <option value="">-- Selecione um cliente --</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Criar Ordem</button>
    </form>

    {{-- Lista de ordens --}}
    <h2>Ordens Existentes</h2>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Cliente</th>
                <th>Status</th>
                <th>Criada em</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordens as $ordem)
                <tr>
                    <td>{{ $ordem->titulo }}</td>
                    <td>{{ $ordem->cliente->nome }}</td>
                    <td>{{ ucfirst($ordem->status) }}</td>
                    <td>{{ $ordem->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $ordens->links() }}

</body>
</html>