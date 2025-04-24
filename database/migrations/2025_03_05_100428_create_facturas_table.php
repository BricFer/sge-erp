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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->morphs('facturable'); // Relación polimórfica (cliente o proveedor)
            $table->string('serie',255);
            $table->foreignId('id_empleado')->constrained('empleados', 'id')->onDelete('cascade');
            $table->decimal('porcentaje_descuento', 8,2)->nullable();
            $table->timestamp('fecha_emision')->useCurrent();
            $table->decimal('monto_subtotal', 8,2)->default(0.00);
            $table->decimal('monto_descuento', 8,2)->default(0.00);
            $table->decimal('monto_iva', 8,2)->default(0.00);
            $table->decimal('monto_total', 8,2)->default(0.00);
            $table->enum('estado', ['borrador', 'emitida', 'pendiente', 'cancelada', 'pagada'])->default('emitida');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
