<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'descripcion' => $this->faker->sentence,
            'responsable_id' => User::factory(),
            'fecha_caducidad' => $this->faker->date(),
            'estado' => 'Abierto',
            'created_at' => now(),
            'updated_at' => now(),
            'tiempo_utilizado' => 1,
            // agrega otros campos que uses, como 'tiempo_utilizado' si es necesario
        ];
    }
}
