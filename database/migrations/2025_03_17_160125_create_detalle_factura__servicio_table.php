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
        Schema::create('detalle_factura__servicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_servicio')->constrained('servicios', 'id')->onDelete('cascade');
            $table->foreignId('id_factura')->constrained('facturas', 'id')->onDelete('cascade');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->enum('estado', ['activo', 'pendiente', 'completado']);
            $table->enum('prioridad', ['baja', 'media', 'alta']);
            $table->unsignedInteger('iva');
            $table->decimal('descuento', 8, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_factura__servicio');
    }
};
