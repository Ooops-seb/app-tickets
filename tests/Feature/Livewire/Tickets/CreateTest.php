<?php

namespace Tests\Feature\Livewire\Tickets;

use App\Livewire\Tickets\Create;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_puede_crear_un_ticket()
    {
        // Crea un usuario para el combo
        $user = User::factory()->create();

        Livewire::test(Create::class)
            ->set('descripcion', 'Ticket de prueba')
            ->set('responsable_id', $user->id)
            ->set('fecha_caducidad', now()->addDays(3)->format('Y-m-d'))
            ->call('crearTicket')
            ->assertRedirect(route('tickets.index'));

        // Verifica en la base de datos
        $this->assertDatabaseHas('tickets', [
            'descripcion' => 'Ticket de prueba',
            'responsable_id' => $user->id,
            'estado' => 'Abierto',
        ]);
    }
}
