<?php

namespace App\Models;

use App\Models\Albaran;
use App\Models\Factura;
use App\Models\Presupuesto;
use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Empleado extends Model
{
    use hasFactory;

    protected $fillable = [
        'nombre',
        'rol',
        'telefono',
        'correo',
    ];

    public function presupuestos(): HasMany
    {
        return $this->hasMany(Presupuesto::class, 'id_empleado');
    }

    public function facturas(): HasMany
    {
        return $this->hasMany(Factura::class, 'id_empleado');
    }

    public function albaranes(): HasMany
    {
        return $this->hasMany(Albaran::class, 'id_empleado');
    }

    public function servicios(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'id_servicio');
    }
}
