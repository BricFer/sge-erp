<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    protected $model = Cliente::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cod_cliente' => $this->faker->bothify('CLI-####'),
            'nombre_completo' => $this->faker->name(),
            'nif' => $this->faker->unique()->regexify('[0-9]{8}[A-Z]'),
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
