<div class="max-w-xl mx-auto mt-8">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Editar Ticket</h2>
    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300">{{ session('success') }}</div>
    @endif
    <form wire:submit.prevent="actualizarEstado" class="space-y-5 bg-white dark:bg-zinc-800 p-6 rounded shadow">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Descripción</label>
            <input type="text" value="{{ $ticket->descripcion }}"
                class="w-full px-3 py-2 border border-gray-300 dark:border-zinc-700 rounded bg-gray-100 dark:bg-zinc-700"
                disabled>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Estado</label>
            <select wire:model="estado"
                class="w-full px-3 py-2 border border-gray-300 dark:border-zinc-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-zinc-900 dark:text-white">
                <option value="Abierto">Abierto</option>
                <option value="Cerrado">Cerrado</option>
            </select>
        </div>
        <div class="flex gap-2">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Actualizar</button>
            <a href="{{ route('tickets.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Cancelar</a>
        </div>
    </form>
</div>