<?php

namespace App\Models;

use App\Models\Albaran;
use App\Models\Almacen;
use App\Models\Factura;
use App\Models\Presupuesto;
use App\Models\Servicio;
use App\Models\User;
use App\Policies\EmpleadoPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
 
#[UsePolicy(EmpleadoPolicy::class)]
class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';
    
    protected $fillable = [
        'legajo',
        'nombre_completo',
        'dni_nif',
        'telefono',
        'correo',
        'cargo',
        'departamento',
        'fecha_contratacion',
        'fecha_fin',
        'estado',
        'user_id',
    ];

    public function almacenes(): HasMany
    {
        return $this->hasMany(Almacen::class, 'id_empleado');
    }

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
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
