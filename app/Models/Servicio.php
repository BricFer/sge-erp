<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicio extends Model
{
    use hasFactory;

    protected $fillable = [
        'id_empleado',
        'descripcion',
        'precio',
    ];

    public function presupuestos(): HasMany
    {
        return $this->hasMany(Presupuesto::class, 'id_empleado');
    }

    public function empleados(): HasMany
    {
        return $this->hasMany(Servicio::class, 'id_servicio');
    }
}
