<?php

namespace App\Models;

use App\Models\Empleado;
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
        'fecha_emision',
        'monto_total',
        'estado',
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
}
