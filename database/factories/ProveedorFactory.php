<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Proveedor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proveedor>
 */
class ProveedorFactory extends Factory
{
    protected $model = Proveedor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company(),
            'cif' => $this->faker->unique()->regexify('[0-9A-Z]{8}'),
            'razon_social' => $this->faker->name(),
            'domicilio' => $this->faker->streetAddress(),
            'cod_postal' => $this->faker->postCode(),
            'poblacion' => $this->faker->city(),
            'provincia' => $this->faker->state(),
            'telefono' => $this->faker->phoneNumber(),
            'correo' => $this->faker->safeEmail(),
        ];
    }
}
