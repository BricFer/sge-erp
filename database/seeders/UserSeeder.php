<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = [
            ['user' => 'lucia.martinez', 'email' => 'lucia.martinez@example.com', 'password' => 'abc123d4'],
            ['user' => 'carlos.perez', 'email' => 'carlos.perez@example.com', 'password' => 'abc123d4'],
            ['user' => 'maria.gomez', 'email' => 'maria.gomez@example.com', 'password' => 'abc123d4'],
            ['user' => 'javier.ruiz', 'email' => 'javier.ruiz@example.com', 'password' => 'abc123d4'],
            ['user' => 'ana.lopez', 'email' => 'ana.lopez@example.com', 'password' => 'abc123d4'],
            ['user' => 'luis.torres', 'email' => 'luis.torres@example.com', 'password' => 'abc123d4'],
            ['user' => 'elena.sanchez', 'email' => 'elena.sanchez@example.com', 'password' => 'abc123d4'],
            ['user' => 'fernando.diaz', 'email' => 'fernando.diaz@example.com', 'password' => 'abc123d4'],
            ['user' => 'carmen.navarro', 'email' => 'carmen.navarro@example.com', 'password' => 'abc123d4'],
            ['user' => 'miguel.romero', 'email' => 'miguel.romero@example.com', 'password' => 'abc123d4'],


            ['user' => 'sara.ortega', 'email' => 'sara.ortega@example.com', 'password' => 'abc123d4'],
            ['user' => 'pedro.gil', 'email' => 'pedro.gil@example.com', 'password' => 'abc123d4'],
            ['user' => 'natalia.ruiz', 'email' => 'natalia.ruiz@example.com', 'password' => 'abc123d4'],
            ['user' => 'andres.vargas', 'email' => 'andres.vargas@example.com', 'password' => 'abc123d4'],
            ['user' => 'veronica.leon', 'email' => 'veronica.leon@example.com', 'password' => 'abc123d4'],
            ['user' => 'hugo.molina', 'email' => 'hugo.molina@example.com', 'password' => 'abc123d4'],
            ['user' => 'laura.ramos', 'email' => 'laura.ramos@example.com', 'password' => 'abc123d4'],
            ['user' => 'pablo.castro', 'email' => 'pablo.castro@example.com', 'password' => 'abc123d4'],
            ['user' => 'marta.fernandez', 'email' => 'marta.fernandez@example.com', 'password' => 'abc123d4'],
            ['user' => 'ivan.herrera', 'email' => 'ivan.herrera@example.com', 'password' => 'abc123d4'],


            ['user' => 'esteban.munoz', 'email' => 'esteban.munoz@example.com', 'password' => 'abc123d4'],
            ['user' => 'nuria.vega', 'email' => 'nuria.vega@example.com', 'password' => 'abc123d4'],
            ['user' => 'david.rios', 'email' => 'david.rios@example.com', 'password' => 'abc123d4'],
            ['user' => 'isabel.cano', 'email' => 'isabel.cano@example.com', 'password' => 'abc123d4'],
            ['user' => 'joaquin.salas', 'email' => 'joaquin.salas@example.com', 'password' => 'abc123d4'],
            ['user' => 'silvia.mora', 'email' => 'silvia.mora@example.com', 'password' => 'abc123d4'],
            ['user' => 'raul.ibanez', 'email' => 'raul.ibanez@example.com', 'password' => 'abc123d4'],
            ['user' => 'beatriz.romero', 'email' => 'beatriz.romero@example.com', 'password' => 'abc123d4'],
            ['user' => 'sergio.marin', 'email' => 'sergio.marin@example.com', 'password' => 'abc123d4'],
            ['user' => 'patricia.leon', 'email' => 'patricia.leon@example.com', 'password' => 'abc123d4'],


            ['user' => 'gustavo.pena', 'email' => 'gustavo.pena@example.com', 'password' => 'abc123d4'],
            ['user' => 'lucia.bravo', 'email' => 'lucia.bravo@example.com', 'password' => 'abc123d4'],
            ['user' => 'manuel.suarez', 'email' => 'manuel.suarez@example.com', 'password' => 'abc123d4'],
            ['user' => 'angela.cordero', 'email' => 'angela.cordero@example.com', 'password' => 'abc123d4'],
            ['user' => 'oscar.lozano', 'email' => 'oscar.lozano@example.com', 'password' => 'abc123d4'],
            ['user' => 'carla.rivas', 'email' => 'carla.rivas@example.com', 'password' => 'abc123d4'],
            ['user' => 'tomas.delgado', 'email' => 'tomas.delgado@example.com', 'password' => 'abc123d4'],
        ];

        foreach ($usuarios as $u) {
            User::create([
                'user' => $u['user'],
                'email' => $u['email'],
                'password' => Hash::make($u['password']),
            ]);
        }
    }
}
