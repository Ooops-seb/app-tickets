<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Carbon;

class Create extends Component
{
    public $descripcion, $responsable_id, $fecha_caducidad;
    public $usuarios;

    public function mount()
    {
        $this->usuarios = User::all();
    }

    public function crearTicket()
    {
        Ticket::create([
            'descripcion' => $this->descripcion,
            'responsable_id' => $this->responsable_id,
            'fecha_caducidad' => $this->fecha_caducidad,
            'estado' => 'Abierto',
        ]);
        $this->reset(['descripcion', 'responsable_id', 'fecha_caducidad']);
        session()->flash('success', 'Ticket creado correctamente.');
        return redirect()->route('tickets.index');
    }

    public function render()
    {
        return view('livewire.tickets.create');
    }
}
