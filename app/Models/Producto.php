<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'categoria',
        'precio_venta',
        'iva',
        'descripcion',
    ];

    public function almacenes(): BelongsToMany
    {
        return $this->belongsToMany(Almacen::class, 'almacen_producto', 'id_producto', 'id_almacen')
                    ->withPivot('stock', 'precio_compra');
    }

    public function stockTotal()
    {
        return $this->almacenes->sum('pivot.stock'); // Suma de los stocks de todos los almacenes
    }
}
