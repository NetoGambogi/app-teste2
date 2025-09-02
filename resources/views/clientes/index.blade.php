<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Clientes</h1>

        <form method="GET" class="mb-4">
            <input type="text" name="name" placeholder="Buscar cliente"
                   value="{{ request('name') }}"
                   class="border rounded p-2 w-1/2">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Buscar</button>
        </form>

        <a href="{{ route('clients.create') }}"
           class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Novo Cliente</a>

        <table class="w-full border-collapse border">
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Nome</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Ações</th>
            </tr>
            @foreach($clients as $client)
                <tr>
                    <td class="border px-4 py-2">{{ $client->name }}</td>
                    <td class="border px-4 py-2">{{ $client->email }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('clients.edit', $client) }}" class="text-blue-500">Editar</a>
                        <form method="POST" action="{{ route('clients.destroy', $client) }}" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Excluir?')" class="text-red-500">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="mt-4">{{ $clients->links() }}</div>
    </div>
</x-app-layout>