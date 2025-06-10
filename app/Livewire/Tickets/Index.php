<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use Carbon\Carbon;

class Index extends Component
{
    public $tickets;

    public function mount()
    {
        $this->tickets = \App\Models\Ticket::with('responsable')->latest()->get();
    }

    public function render()
    {
        return view('livewire.tickets.index');
    }

    public function getTiempoHumano($fechaCreacion)
    {
        return Carbon::parse($fechaCreacion)->diffForHumans(null, true, false, 2);
    }
}
