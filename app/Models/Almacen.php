<?php

namespace App\Models;

use App\Models\Empleado;
use App\Models\Factura;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


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

    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class, 'almacen_producto', 'id_almacen', 'id_producto')
                    ->withPivot('stock', 'precio_compra');
    }

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    // Relación entre las facturas entran/salen y el almacen
    public function facturas(): HasMany
    {
        return $this->hasMany(Factura::class, 'id_almacen');
    }
}
