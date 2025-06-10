<div class="max-w-xl mx-auto mt-8">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Crear Ticket</h2>
    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300">{{ session('success') }}</div>
    @endif
    <form wire:submit.prevent="crearTicket" class="space-y-5 bg-white dark:bg-zinc-800 p-6 rounded shadow">
        <div>
            <label for="descripcion"
                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Descripción</label>
            <input type="text" wire:model="descripcion" id="descripcion"
                class="w-full px-3 py-2 border border-gray-300 dark:border-zinc-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-zinc-900 dark:text-white"
                required>
        </div>
        <div>
            <label for="responsable_id"
                class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Responsable</label>
            <select wire:model="responsable_id" id="responsable_id"
                class="w-full px-3 py-2 border border-gray-300 dark:border-zinc-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-zinc-900 dark:text-white"
                required>
                <option value="">Seleccione...</option>
                @foreach($usuarios as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="fecha_caducidad" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Fecha
                de caducidad</label>
            <input type="date" wire:model="fecha_caducidad" id="fecha_caducidad"
                class="w-full px-3 py-2 border border-gray-300 dark:border-zinc-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-zinc-900 dark:text-white"
                required>
        </div>
        <div class="flex gap-2">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Crear</button>
            <a href="{{ route('tickets.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Cancelar</a>
        </div>
    </form>
</div>