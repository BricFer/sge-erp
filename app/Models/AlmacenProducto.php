<?php

namespace App\Models;

use App\Models\Almacen;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlmacenProducto extends Model
{
    use HasFactory;

    protected $table = 'almacen_producto';

    protected $fillable = [
        'id_producto',
        'id_almacen',
        'stock',
    ];

    public function almacen(): BelongsTo
    {
        return $this->belongsTo(Almacen::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
