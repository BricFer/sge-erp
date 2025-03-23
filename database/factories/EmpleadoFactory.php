<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    protected $model = Empleado::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'dni_nif' => $this->faker->unique()->regexify('[0-9A-Z]{8}[A-Z]'),
            'telefono' => $this->faker->phoneNumber(),
            'correo' => $this->faker->unique()->safeEmail(),
            'cargo' => $this->faker->jobTitle(),
            'fecha_contratacion' => $this->faker->date(),
            'estado' => $this->faker->randomElement(['activo', 'excedencia', 'baja voluntaria', 'despido']),
        ];
    }
}
