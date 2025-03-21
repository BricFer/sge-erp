<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Servicio extends Model
{
    use hasFactory;

    protected $fillable = [
        'id_servicio',
        'id_factura',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'prioridad',
        'descuento',
        'subtotal',
    ];

    // Relación con la factura
    public function factura(): BelongsTo
    {
        return $this->belongsTo(Factura::class, 'id_factura');
    }

    // Relación con el empleado
    public function servicio(): BelongsTo
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }
}
