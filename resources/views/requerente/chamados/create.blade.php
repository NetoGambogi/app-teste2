<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abrir Novo Chamado</title>
<body>
        <h2>Abrir Novo Chamado</h2>


        <form action="{{ route('requerente.chamados.store') }}" method="POST">
            @csrf  {{-- Token de segurança obrigatório do Laravel --}}


                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}">
                {{-- Exibe a mensagem de erro para o campo 'titulo' --}}
                @error('titulo')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" rows="5">{{ old('descricao') }}</textarea>
                {{-- Exibe a mensagem de erro para o campo 'descricao' --}}
                @error('descricao')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Enviar Chamado</button>
            <a href="{{ route('requerente.dashboard') }}" style="margin-left: 1em;">Cancelar</a>
        </form>
    </div>
</body>
</html>
