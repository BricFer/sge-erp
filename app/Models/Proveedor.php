<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use hasFactory;

    protected $table = 'proveedores';
    
    protected $fillable = [
        'nombre',
        'cif',
        'domicilio',
        'cod_postal',
        'poblacion',
        'provincia',
        'telefono',
        'correo'
    ];
}
