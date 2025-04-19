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
        // Se crea un estado aleatorio entre los valores del array
        $estado = $this->faker->randomElement(['activo', 'excedencia', 'baja voluntaria', 'despido']);

        return [
            'nombre' => $this->faker->name(),
            'dni_nif' => $this->faker->unique()->regexify('[0-9A-Z]{8}[A-Z]'),
            'telefono' => $this->faker->phoneNumber(),
            'correo' => $this->faker->unique()->companyEmail(),
            'password' => $this->faker->password(8, 20),
            'cargo' => $this->faker->jobTitle(),
            'departamento' =>$this->faker->jobTitle(),
            'fecha_contratacion' => $this->faker->date(),

            // Se comprueba que el estado sea despido o baja voluntaria para asignarle una fecha_fin si no es ninguno de los valores se guarda null
            'fecha_fin' => in_array($estado, ['despido', 'baja voluntaria']) ? $this->faker->date() : null,

            // Se guarda el estado en la columna correspondiente
            'estado' => $estado,
            'user_id' => $this->faker->randomElement($empleadoIds), // Selecciona un ID aleatorio
        ];
    }
}
