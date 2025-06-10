<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;
use Illuminate\Support\Carbon;

class Edit extends Component
{
    public $ticket;
    public $estado;

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
        $this->estado = $ticket->estado;
    }

    public function actualizarEstado()
    {
        $this->ticket->estado = $this->estado;
        // Calcular tiempo utilizado si se cierra
        if ($this->estado === 'Cerrado' && !$this->ticket->tiempo_utilizado) {
            $this->ticket->tiempo_utilizado = now()->diffInHours($this->ticket->created_at);
        }
        $this->ticket->save();
        session()->flash('success', 'Estado actualizado.');
        return redirect()->route('tickets.index');
    }

    public function render()
    {
        return view('livewire.tickets.edit');
    }
}
