<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_empleado',
        'nombre',
        'descripcion',
        'precio',
        'tipo_servicio',
    ];

    // public function presupuestos(): HasMany
    // {
    //     return $this->hasMany(Presupuesto::class, 'id_servicio');
    // }

    // public function facturas(): HasMany
    // {
    //     return $this->hasMany(Factura::class, 'id_servicio');
    // }

    public function empleados(): HasMany
    {
        return $this->hasMany(Empleado::class, 'id_servicio');
    }

    // /**
    //  * Relación: Un servicio puede estar en muchos detalles de factura.
    //  */
    // public function detallesFactura(): HasMany
    // {
    //     return $this->hasMany(DetalleFacturaServicio::class, 'id_servicio');
    // }

    // /**
    //  * Relación: Un servicio puede estar en muchos detalles de presupuesto.
    //  */
    // public function detallesPresupuesto(): HasMany
    // {
    //     return $this->hasMany(DetallePresupuestoServicio::class, 'id_servicio');
    // }

    public function facturas()
    {
        return $this->belongsToMany(Factura::class, 'detalle_factura_servicio', 'id_factura', 'id_servicio')
                    ->withPivot('fecha_inicio', 'fecha_fin', 'estado', 'prioridad', 'descuento', 'subtotal');
    }
}
