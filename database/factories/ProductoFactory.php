<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(), // Un nombre aleatorio de producto
            'precio_compra' => $this->faker->randomFloat(2, 10, 1000), // Precio de compra entre 10 y 1000 con 2 decimales
            'precio_venta' => $this->faker->randomFloat(2, 20, 2000), // Precio de venta entre 20 y 2000 con 2 decimales
            'iva' => $this->faker->randomElement([4, 10, 21]), // IVA: 4%, 10%, o 21%
            'descripcion' => $this->faker->sentence(), // Descripción aleatoria de producto
        ];
    }
}
