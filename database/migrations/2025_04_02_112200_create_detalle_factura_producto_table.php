<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_factura_producto', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('num_linea');
            $table->foreignId('id_producto')->constrained('productos', 'id')->onDelete('cascade');
            $table->foreignId('id_factura')->constrained('facturas', 'id')->onDelete('cascade');
            $table->decimal('precio', 8, 2);
            $table->unsignedInteger('iva')->default(0);
            $table->unsignedInteger('cantidad');
            $table->decimal('descuento', 8, 2)->nullable();
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_factura_producto');
    }
};
