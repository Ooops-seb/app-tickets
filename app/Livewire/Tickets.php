<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Ticket;

class Tickets extends Component
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
            'fecha_creacion' => now(),
            'estado' => 'Abierto'
        ]);
        $this->reset(['descripcion', 'responsable_id', 'fecha_caducidad']);
    }
}
