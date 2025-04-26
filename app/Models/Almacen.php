<?php

namespace App\Models;

use App\Models\Almacen;
use App\Models\Empleado;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Almacen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ubicacion',
        'capacidad',
        'estado',
        'id_empleado',
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'almacen_producto', 'id_almacen', 'id_producto')
                    ->withPivot('stock');
    }

    public function empleados(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    public function facturas(): HasMany
    {
        return $this->hasMany(Almacen::class, 'id_almacen');
    }
}
