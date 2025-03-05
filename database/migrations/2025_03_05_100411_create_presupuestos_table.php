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
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id();
            $table->morphs('presupuestable'); // Relación polimórfica (cliente o proveedor)
            $table->foreignId('id_empleado')->constrained('empleados', 'id')->onDelete('cascade');
            $table->timestamp('fecha_emision')->nullable();
            $table->decimal('monto_total',8,2);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuestos');
    }
};
