<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AlmacenProducto;
use App\Models\Almacen;
use App\Models\Producto;

class AlmacenProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegurar que haya almacenes y productos antes de poblar la tabla pivote
        $almacenes = Almacen::all();
        $productos = Producto::all();

        if ($almacenes->isEmpty() || $productos->isEmpty()) {
            $this->command->warn('No hay almacenes o productos. Se necesitan antes de poblar almacen_producto.');
            return;
        }

        // Crear registros en la tabla pivote

        foreach ($almacenes as $almacen) {
            foreach ($productos->random(rand(1, 15)) as $producto) { // Asigna de 1 a 15 productos a cada almacén
                $almacen->productos()->attach($producto->id, [
                    'stock' => rand(1, 100), // Genera un stock aleatorio
                ]);
            }
        }
    }
}
