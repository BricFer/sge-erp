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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('legajo')->unique();
            $table->string('nombre_completo', 255);
            $table->string('dni_nif', 75)->unique();
            $table->string('telefono', 25);
            $table->string('correo', 120)->unique();
            $table->string('cargo', 120);
            $table->string('departamento', 120);
            $table->date('fecha_contratacion');
            $table->date('fecha_fin')->nullable();
            $table->enum('estado', ['activo', 'excedencia', 'baja voluntaria', 'despido'])->default('activo');
            $table->unsignedBigInteger('user_id')->unique(); // clave foránea y única (1:1)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
