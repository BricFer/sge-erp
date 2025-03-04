<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use hasFactory;

    protected $fillable = [
        'nombre',
        'rol',
        'telefono',
        'correo',
    ];
}
