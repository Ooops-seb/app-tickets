<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'descripcion',
        'responsable_id',
        'fecha_caducidad',
        'tiempo_utilizado',
        'estado',
    ];

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }
}
