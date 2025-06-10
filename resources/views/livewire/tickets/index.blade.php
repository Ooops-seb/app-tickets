<div class="max-w-5xl mx-auto mt-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Tickets</h2>
        <a href="{{ route('tickets.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Crear Ticket</a>
    </div>
    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300">{{ session('success') }}</div>
    @endif
    <div class="overflow-x-auto rounded shadow">
        <table class="min-w-full bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-200">ID</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-200">Descripción
                    </th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-200">Responsable
                    </th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-200">Fecha
                        creación</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-200">Fecha
                        caducidad</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-200">Tiempo
                        utilizado</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-200">Estado</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-200">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr class="border-t border-gray-200 dark:border-zinc-700 hover:bg-gray-50 dark:hover:bg-zinc-700">
                        <td class="px-4 py-2">{{ $ticket->id }}</td>
                        <td class="px-4 py-2">{{ $ticket->descripcion }}</td>
                        <td class="px-4 py-2">{{ $ticket->responsable->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $ticket->created_at }}</td>
                        <td class="px-4 py-2">{{ $ticket->fecha_caducidad }}</td>
                        <td class="px-4 py-2">
                            {{ $ticket->estado === 'Cerrado' ? app(\App\Livewire\Tickets\Index::class)->getTiempoHumano($ticket->created_at) : '-' }}
                        </td>
                        <td class="px-4 py-2">
                            <span class="inline-block px-2 py-1 rounded text-xs font-semibold"
                                style="background-color: {{ $ticket->estado == 'Abierto' ? '#DBEAFE' : '#BBF7D0' }}; color: {{ $ticket->estado == 'Abierto' ? '#1E40AF' : '#166534' }};">
                                {{ $ticket->estado }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('tickets.edit', $ticket) }}"
                                class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition text-xs">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>