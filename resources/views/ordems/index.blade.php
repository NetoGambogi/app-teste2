<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Ordens de Serviço</h1>

        <form method="GET" class="mb-4 flex gap-2">
            <input type="text" name="client_name" placeholder="Buscar cliente"
                   value="{{ request('client_name') }}"
                   class="border rounded p-2">
            <select name="status" class="border rounded p-2">
                <option value="">-- Status --</option>
                <option value="aberta" {{ request('status')=='aberta'?'selected':'' }}>Aberta</option>
                <option value="em_andamento" {{ request('status')=='em_andamento'?'selected':'' }}>Em andamento</option>
                <option value="concluida" {{ request('status')=='concluida'?'selected':'' }}>Concluída</option>
            </select>
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Filtrar</button>
        </form>

        <a href="{{ route('orders.create') }}"
           class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Nova Ordem</a>

        <table class="w-full border-collapse border">
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Título</th>
                <th class="border px-4 py-2">Cliente</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Criado por</th>
                <th class="border px-4 py-2">Ações</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td class="border px-4 py-2">{{ $order->title }}</td>
                    <td class="border px-4 py-2">{{ $order->client->name }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($order->status) }}</td>
                    <td class="border px-4 py-2">{{ $order->user->name }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('orders.edit', $order) }}" class="text-blue-500">Editar</a>
                        <form method="POST" action="{{ route('orders.destroy', $order) }}" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Excluir?')" class="text-red-500">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="mt-4">{{ $orders->links() }}</div>
    </div>
</x-app-layout>