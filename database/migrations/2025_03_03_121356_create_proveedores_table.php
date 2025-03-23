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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('cif', 12)->unique();
            $table->string('razon_social', 255)->unique();
            $table->string('domicilio', 255);
            $table->string('cod_postal', 12);
            $table->string('poblacion', 25);
            $table->string('provincia', 25);
            $table->string('telefono', 25)->nullable();
            $table->string('correo', 120)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
