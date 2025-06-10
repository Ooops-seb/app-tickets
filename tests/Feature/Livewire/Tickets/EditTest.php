<?php

namespace Tests\Feature\Livewire\Tickets;

use App\Livewire\Tickets\Edit;
use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class EditTest extends TestCase
{
    use RefreshDatabase;

    public function test_puede_actualizar_el_estado_y_tiempo_utilizado_de_ticket()
    {
        // Creamos un ticket de prueba, creado hace 2 horas
        $ticket = Ticket::factory()->create([
            'estado' => 'Abierto',
            'created_at' => now()->subHours(2),
            'tiempo_utilizado' => 1,
        ]);

        Livewire::test(Edit::class, ['ticket' => $ticket])
            ->set('estado', 'Cerrado')
            ->call('actualizarEstado')
            ->assertRedirect(route('tickets.index'));

        $ticket->refresh();
        $this->assertEquals('Cerrado', $ticket->estado);
        // El tiempo utilizado debería ser 2 (horas)
        $this->assertEquals(2, $ticket->tiempo_utilizado);
    }
}
