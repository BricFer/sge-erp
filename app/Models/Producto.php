<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    use hasFactory;

    protected $fillable = [
        'nombre',
        'precio_compra',
        'precio_venta',
        'iva',
        'descripcion',
    ];

    public function almacenes() {
        
        return $this->belongsToMany(Almacen::class, 'almacen_producto')
                    ->withPivot('stock')
                    ->withTimestamps();
    }
}
