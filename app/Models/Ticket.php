<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

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
