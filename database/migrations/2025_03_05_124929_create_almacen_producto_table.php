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
        Schema::create('almacen_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producto')->constrained('productos', 'id')->onDelete('cascade');
            $table->foreignId('id_almacen')->constrained('almacens', 'id')->onDelete('cascade');
            $table->decimal('precio_compra', 10, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almacen_producto');
    }
};
