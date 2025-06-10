<form wire:submit.prevent="crearTicket">
    <input type="text" wire:model="descripcion" placeholder="Descripción">
    <select wire:model="responsable_id">
        @foreach($usuarios as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <input type="date" wire:model="fecha_caducidad">
    <button type="submit">Crear</button>
</form>
