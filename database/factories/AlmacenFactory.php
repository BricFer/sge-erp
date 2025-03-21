<?php

namespace Database\Factories;

use App\Models\Almacen;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Almacen>
 */
class AlmacenFactory extends Factory
{
    protected $model = Almacen::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=> $this->faker->company(),
            'ubicacion' => $this->faker->address(),
            'capacidad' => $this->faker->numberBetween(100, 10000),
            'estado' =>$this->faker->randomElement(['Activo', 'Inactivo']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
