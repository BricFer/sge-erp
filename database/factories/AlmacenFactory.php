<?php

namespace Database\Factories;

use App\Models\Almacen;
use App\Models\Empleado;
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
            // Obtener los IDs de empleados que cumplen la condición
            $empleadoIds = Empleado::all() //whereIn('cargo', ['Command Control Center Specialist', 'MARCOM Manager'])
            ->pluck('id')
            ->toArray();

            // pluck('columna') devuelve una colección o un array con los valores de una columna específica de los resultados obtenidos de la base de datos.

        return [
            'nombre'=> $this->faker->company(),
            'ubicacion' => $this->faker->address(),
            'capacidad' => $this->faker->numberBetween(100, 8000),
            'estado' =>$this->faker->randomElement(['activo', 'inactivo']),
            'id_empleado' => $this->faker->randomElement($empleadoIds), // Selecciona un ID aleatorio
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
