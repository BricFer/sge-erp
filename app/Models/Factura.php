<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Factura extends Model
{
    use hasFactory;

    protected $fillable = [
        'facturable_id',
        'facturable_type',
        'referencia',
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
}
