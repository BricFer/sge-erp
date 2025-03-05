<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use hasFactory;

    protected $fillable = [
        'nombre',
        'ubicacion',
    ];

    public function productos() {
        
        return $this->belongsToMany(Producto::class, 'almacen_producto')
                    ->withPivot('stock')
                    ->withTimestamps();
    }
}
