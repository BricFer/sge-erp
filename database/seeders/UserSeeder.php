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
            [
                'user' => 'lucia.martinez',
                'email' => 'lucia.martinez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'carlos.perez',
                'email' => 'carlos.perez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 1
            ],
            [
                'user' => 'maria.gomez',
                'email' => 'maria.gomez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 1
            ],
            [
                'user' => 'javier.ruiz',
                'email' => 'javier.ruiz@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'ana.lopez',
                'email' => 'ana.lopez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'luis.torres',
                'email' => 'luis.torres@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'elena.sanchez',
                'email' => 'elena.sanchez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'fernando.diaz',
                'email' => 'fernando.diaz@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 1
            ],
            [
                'user' => 'carmen.navarro',
                'email' => 'carmen.navarro@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'miguel.romero',
                'email' => 'miguel.romero@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 1
            ],


            [
                'user' => 'sara.ortega',
                'email' => 'sara.ortega@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'pedro.gil',
                'email' => 'pedro.gil@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 1
            ],
            [
                'user' => 'natalia.ruiz',
                'email' => 'natalia.ruiz@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'andres.vargas',
                'email' => 'andres.vargas@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'veronica.leon',
                'email' => 'veronica.leon@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'hugo.molina',
                'email' => 'hugo.molina@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'laura.ramos',
                'email' => 'laura.ramos@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 1
            ],
            [
                'user' => 'pablo.castro',
                'email' => 'pablo.castro@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'marta.fernandez',
                'email' => 'marta.fernandez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'ivan.herrera',
                'email' => 'ivan.herrera@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 1
            ],


            // Departamento: Ventas
            [
                'user' => 'esteban.munoz',
                'email' => 'esteban.munoz@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'nuria.vega',
                'email' => 'nuria.vega@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'david.rios',
                'email' => 'david.rios@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'isabel.cano',
                'email' => 'isabel.cano@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'joaquin.salas',
                'email' => 'joaquin.salas@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'silvia.mora',
                'email' => 'silvia.mora@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'raul.ibanez',
                'email' => 'raul.ibanez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'beatriz.romero',
                'email' => 'beatriz.romero@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'sergio.marin',
                'email' => 'sergio.marin@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'patricia.leon',
                'email' => 'patricia.leon@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],

            // Departamento: Almacén
            [
                'user' => 'gustavo.pena',
                'email' => 'gustavo.pena@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'lucia.bravo',
                'email' => 'lucia.bravo@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'manuel.suarez',
                'email' => 'manuel.suarez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'angela.cordero',
                'email' => 'angela.cordero@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'oscar.lozano',
                'email' => 'oscar.lozano@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'carla.rivas',
                'email' => 'carla.rivas@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'tomas.delgado',
                'email' => 'tomas.delgado@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],

            // Departamento: Contabilidad
            [
                'user' => 'ana.martinez',
                'email' => 'ana.martinez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'javier.lopez',
                'email' => 'javier.lopez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'beatriz.sanchez',
                'email' => 'beatriz.sanchez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'carlos.ramos',
                'email' => 'carlos.ramos@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'maria.ruiz',
                'email' => 'maria.ruiz@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'sergio.gomez',
                'email' => 'sergio.gomez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'elena.torres',
                'email' => 'elena.torres@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'manuel.navarro',
                'email' => 'manuel.navarro@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'patricia.ortega',
                'email' => 'patricia.ortega@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'luis.ramirez',
                'email' => 'luis.ramirez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],

            // Departamento: Compras
            [
                'user' => 'laura.morales',
                'email' => 'laura.morales@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'alberto.diaz',
                'email' => 'alberto.diaz@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'marta.gil',
                'email' => 'marta.gil@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'david.herrera',
                'email' => 'david.herrera@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'lucia.cano',
                'email' => 'lucia.cano@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'raul.jimenez',
                'email' => 'raul.jimenez@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'sara.medina',
                'email' => 'sara.medina@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'hector.rios',
                'email' => 'hector.rios@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'teresa.vega',
                'email' => 'teresa.vega@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
            [
                'user' => 'ignacio.ramos',
                'email' => 'ignacio.ramos@example.com',
                'password' => 'abc123d4',
                'isAdmin' => 0
            ],
        ];

        foreach ($usuarios as $u) {
            User::create([
                'user' => $u['user'],
                'email' => $u['email'],
                'password' => Hash::make($u['password']),
                'isAdmin' => $u['isAdmin'],
            ]);
        }
    }
}
