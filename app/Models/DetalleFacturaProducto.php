<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleFacturaProducto extends Model
{
    use HasFactory;

    protected $table = 'detalle_factura_producto';

    protected $fillable = [
        'id_producto',
        'id_factura',
        'precio',
        'iva',
        'cantidad',
        'descuento',
        'subtotal',
    ];

    // Relación con la factura
    public function factura(): BelongsTo
    {
        return $this->belongsTo(Factura::class, 'id_factura');
    }

    // Relación con el producto
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
