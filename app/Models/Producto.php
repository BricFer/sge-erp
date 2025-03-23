<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'precio_compra',
        'precio_venta',
        'iva',
        'descripcion',
    ];

    public function almacenes()
    {
        return $this->belongsToMany(Almacen::class, 'almacen_producto', 'id_producto', 'id_almacen')
                    ->withPivot('stock');
    }

    public function stockTotal()
    {
        return $this->almacenes->sum('pivot.stock'); // Suma de los stocks de todos los almacenes
    }
}
