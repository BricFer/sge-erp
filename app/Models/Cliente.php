<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use hasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'nif',
        'domicilio',
        'cod_postal',
        'poblacion',
        'provincia',
        'telefono',
        'correo'
    ];
}
