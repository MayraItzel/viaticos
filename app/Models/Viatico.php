<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viatico extends Model
{
    use HasFactory;

    // Asegúrate de que los campos sean "fillable" para que puedan ser asignados masivamente
    protected $fillable = [
        'solicitante', 
        'puesto', 
        'dependencia', 
        'importe',
    ];
}
