<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleFacturaServicio extends Model
{
    use HasFactory;

    protected $table = 'detalle_factura_servicio';

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

    // Relación con el servicio
    public function servicio(): BelongsTo
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }
}
