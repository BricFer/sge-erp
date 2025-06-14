<?php

namespace App\Models;

use App\Models\Albaran;
use App\Models\Factura;
use App\Models\Presupuesto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    
    protected $fillable = [
        'cod_proveedor',
        'nombre_completo',
        'cif',
        'razon_social',
        'domicilio',
        'cod_postal',
        'poblacion',
        'provincia',
        'telefono',
        'correo'
    ];

    public function presupuestos(): MorphMany
    {
        return $this->morphMany(Presupuesto::class, 'presupuestable');
    }
    public function facturas(): MorphMany
    {
        return $this->morphMany(Factura::class, 'facturable');
    }
    public function albaranes(): MorphMany
    {
        return $this->morphMany(Albaran::class, 'entregado');
    }
}
