<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use hasFactory;

    protected $fillable = [
        'nombre',
        'id_almacen',
        'precio_compra',
        'precio_venta',
        'iva',
    ];
}
