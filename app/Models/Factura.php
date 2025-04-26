<?php

namespace App\Models;

use App\Models\Empleado;
use App\Models\Producto;
use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'facturable_id',
        'facturable_type',
        'serie',
        'id_empleado',
        'porcentaje_descuento',
        'fecha_emision',
        'monto_subtotal',
        'monto_descuento',
        'monto_iva',
        'monto_total',
        'estado',
        'id_almacen',
    ];

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    public function facturable(): MorphTo
    {
        return $this->morphTo();
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'detalle_factura_servicio', 'id_factura', 'id_servicio')
                    ->withPivot('fecha_inicio', 'fecha_fin', 'estado', 'prioridad', 'descuento', 'subtotal');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalle_factura_producto', 'id_factura', 'id_producto')->withPivot('num_linea', 'precio', 'iva', 'cantidad', 'descuento', 'subtotal');
    }
    
    public function almacen(): BelongsTo
    {
        return $this->belongsTo(Almacen::class, 'id_almacen');
    }
}
