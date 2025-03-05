<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Presupuesto extends Model
{
    use hasFactory;

    protected $fillable = [
        'facturable_id',
        'facturable_type',
        'id_empleado',
        'fecha_emision',
        'monto_total',
    ];

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    public function presupuestable(): MorphTo
    {
        return $this->morphTo();
    }
}
