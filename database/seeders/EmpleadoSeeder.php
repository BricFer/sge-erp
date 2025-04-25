<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Empleado::factory(37)->create();

        $userIds = DB::table('users')->pluck('id')->toArray();

        $empleados = [
            ['legajo'=> '20251', 'nombre_completo' => 'Lucía Martínez', 'dni_nif' => '12345678A', 'telefono' => '600123456', 'correo' => 'lucia.martinez@example.com', 'cargo' => 'Manager de Marketing', 'departamento' => 'Marketing', 'fecha_contratacion' => '2022-03-15', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '20252', 'nombre_completo' => 'Carlos Pérez', 'dni_nif' => '87654321B', 'telefono' => '611223344', 'correo' => 'carlos.perez@example.com', 'cargo' => 'Desarrollador Backend', 'departamento' => 'IT', 'fecha_contratacion' => '2021-07-10', 'fecha_fin' => null, 'estado' => 'excedencia'],
            ['legajo'=> '20253', 'nombre_completo' => 'María Gómez', 'dni_nif' => '23456789C', 'telefono' => '622334455', 'correo' => 'maria.gomez@example.com', 'cargo' => 'Técnico de Soporte', 'departamento' => 'IT', 'fecha_contratacion' => '2023-01-05', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '20254', 'nombre_completo' => 'Javier Ruiz', 'dni_nif' => '34567890D', 'telefono' => '633445566', 'correo' => 'javier.ruiz@example.com', 'cargo' => 'Analista Financiero', 'departamento' => 'Finanzas', 'fecha_contratacion' => '2020-09-18', 'fecha_fin' => '2020-11-03', 'estado' => 'baja voluntaria'],
            ['legajo'=> '20255', 'nombre_completo' => 'Ana López', 'dni_nif' => '45678901E', 'telefono' => '644556677', 'correo' => 'ana.lopez@example.com', 'cargo' => 'Diseñadora UX', 'departamento' => 'Marketing', 'fecha_contratacion' => '2022-12-01', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '20256', 'nombre_completo' => 'Luis Torres', 'dni_nif' => '56789012F', 'telefono' => '655667788', 'correo' => 'luis.torres@example.com', 'cargo' => 'Responsable de RRHH', 'departamento' => 'RRHH', 'fecha_contratacion' => '2019-03-11', 'fecha_fin' => '2020-08-19', 'estado' => 'despido'],
            ['legajo'=> '20257', 'nombre_completo' => 'Elena Sánchez', 'dni_nif' => '67890123G', 'telefono' => '666778899', 'correo' => 'elena.sanchez@example.com', 'cargo' => 'Reclutadora', 'departamento' => 'RRHH', 'fecha_contratacion' => '2021-06-20', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '20258', 'nombre_completo' => 'Fernando Díaz', 'dni_nif' => '78901234H', 'telefono' => '677889900', 'correo' => 'fernando.diaz@example.com', 'cargo' => 'Project Manager', 'departamento' => 'IT', 'fecha_contratacion' => '2023-02-14', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '20259', 'nombre_completo' => 'Carmen Navarro', 'dni_nif' => '89012345I', 'telefono' => '688990011', 'correo' => 'carmen.navarro@example.com', 'cargo' => 'Asistente Administrativa', 'departamento' => 'Administración', 'fecha_contratacion' => '2022-04-25', 'fecha_fin' => null, 'estado' => 'excedencia'],
            ['legajo'=> '202510', 'nombre_completo' => 'Miguel Romero', 'dni_nif' => '90123456J', 'telefono' => '699001122', 'correo' => 'miguel.romero@example.com', 'cargo' => 'Ingeniero de Sistemas', 'departamento' => 'IT', 'fecha_contratacion' => '2020-11-30', 'fecha_fin' => '2022-10-13', 'estado' => 'baja voluntaria'],


            ['legajo'=> '202511', 'nombre_completo' => 'Sara Ortega', 'dni_nif' => '11223344K', 'telefono' => '600112233', 'correo' => 'sara.ortega@example.com', 'cargo' => 'Contable', 'departamento' => 'Finanzas', 'fecha_contratacion' => '2023-07-01', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202512', 'nombre_completo' => 'Pedro Gil', 'dni_nif' => '22334455L', 'telefono' => '611223344', 'correo' => 'pedro.gil@example.com', 'cargo' => 'Consultor Técnico', 'departamento' => 'IT', 'fecha_contratacion' => '2018-01-22', 'fecha_fin' => '2018-02-03', 'estado' => 'despido'],
            ['legajo'=> '202513', 'nombre_completo' => 'Natalia Ruiz', 'dni_nif' => '33445566M', 'telefono' => '622334455', 'correo' => 'natalia.ruiz@example.com', 'cargo' => 'Community Manager', 'departamento' => 'Marketing', 'fecha_contratacion' => '2021-09-10', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202514', 'nombre_completo' => 'Andrés Vargas', 'dni_nif' => '44556677N', 'telefono' => '633445566', 'correo' => 'andres.vargas@example.com', 'cargo' => 'Diseñador Gráfico', 'departamento' => 'Marketing', 'fecha_contratacion' => '2023-03-03', 'fecha_fin' => null, 'estado' => 'excedencia'],
            ['legajo'=> '202515', 'nombre_completo' => 'Verónica León', 'dni_nif' => '55667788O', 'telefono' => '644556677', 'correo' => 'veronica.leon@example.com', 'cargo' => 'Técnico en Nóminas', 'departamento' => 'RRHH', 'fecha_contratacion' => '2020-08-16', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202516', 'nombre_completo' => 'Hugo Molina', 'dni_nif' => '66778899P', 'telefono' => '655667788', 'correo' => 'hugo.molina@example.com', 'cargo' => 'Auditor Interno', 'departamento' => 'Finanzas', 'fecha_contratacion' => '2021-01-10', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202517', 'nombre_completo' => 'Laura Ramos', 'dni_nif' => '77889900Q', 'telefono' => '666778899', 'correo' => 'laura.ramos@example.com', 'cargo' => 'Jefa de Proyectos', 'departamento' => 'IT', 'fecha_contratacion' => '2023-05-22', 'fecha_fin' => '2023-12-01', 'estado' => 'baja voluntaria'],
            ['legajo'=> '202518', 'nombre_completo' => 'Pablo Castro', 'dni_nif' => '88990011R', 'telefono' => '677889900', 'correo' => 'pablo.castro@example.com', 'cargo' => 'Especialista SEO', 'departamento' => 'Marketing', 'fecha_contratacion' => '2022-10-14', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202519', 'nombre_completo' => 'Marta Fernández', 'dni_nif' => '99001122S', 'telefono' => '688990011', 'correo' => 'marta.fernandez@example.com', 'cargo' => 'Recepcionista', 'departamento' => 'Administración', 'fecha_contratacion' => '2020-06-08', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202520', 'nombre_completo' => 'Iván Herrera', 'dni_nif' => '10111213T', 'telefono' => '699001122', 'correo' => 'ivan.herrera@example.com', 'cargo' => 'Tester QA', 'departamento' => 'IT', 'fecha_contratacion' => '2021-11-11', 'fecha_fin' => null, 'estado' => 'excedencia'],


            // Departamento: Ventas
            ['legajo'=> '202521', 'nombre_completo' => 'Esteban Muñoz', 'dni_nif' => '12398745U', 'telefono' => '600111222', 'correo' => 'esteban.munoz@example.com', 'cargo' => 'Vendedor Senior', 'departamento' => 'Ventas', 'fecha_contratacion' => '2021-03-20', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202522', 'nombre_completo' => 'Nuria Vega', 'dni_nif' => '23487654V', 'telefono' => '611222333', 'correo' => 'nuria.vega@example.com', 'cargo' => 'Vendedora Junior', 'departamento' => 'Ventas', 'fecha_contratacion' => '2023-01-15', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202523', 'nombre_completo' => 'David Ríos', 'dni_nif' => '34576543W', 'telefono' => '622333444', 'correo' => 'david.rios@example.com', 'cargo' => 'Representante de Ventas', 'departamento' => 'Ventas', 'fecha_contratacion' => '2022-07-05', 'fecha_fin' => '2025-04-10', 'estado' => 'baja voluntaria'],
            ['legajo'=> '202524', 'nombre_completo' => 'Isabel Cano', 'dni_nif' => '45665432X', 'telefono' => '633444555', 'correo' => 'isabel.cano@example.com', 'cargo' => 'Supervisora de Ventas', 'departamento' => 'Ventas', 'fecha_contratacion' => '2020-09-12', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202525', 'nombre_completo' => 'Joaquín Salas', 'dni_nif' => '56754321Y', 'telefono' => '644555666', 'correo' => 'joaquin.salas@example.com', 'cargo' => 'Analista Comercial', 'departamento' => 'Ventas', 'fecha_contratacion' => '2019-05-30', 'fecha_fin' => '2020-03-30', 'estado' => 'despido'],
            ['legajo'=> '202526', 'nombre_completo' => 'Silvia Mora', 'dni_nif' => '67843210Z', 'telefono' => '655666777', 'correo' => 'silvia.mora@example.com', 'cargo' => 'Promotora', 'departamento' => 'Ventas', 'fecha_contratacion' => '2022-10-10', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202527', 'nombre_completo' => 'Raúl Ibáñez', 'dni_nif' => '78932109A', 'telefono' => '666777888', 'correo' => 'raul.ibanez@example.com', 'cargo' => 'Encargado de Zona', 'departamento' => 'Ventas', 'fecha_contratacion' => '2021-04-04', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202528', 'nombre_completo' => 'Beatriz Romero', 'dni_nif' => '89021098B', 'telefono' => '677888999', 'correo' => 'beatriz.romero@example.com', 'cargo' => 'Ejecutiva de Cuentas', 'departamento' => 'Ventas', 'fecha_contratacion' => '2023-08-01', 'fecha_fin' => null, 'estado' => 'excedencia'],
            ['legajo'=> '202529', 'nombre_completo' => 'Sergio Marín', 'dni_nif' => '90110987C', 'telefono' => '688999000', 'correo' => 'sergio.marin@example.com', 'cargo' => 'Asesor Comercial', 'departamento' => 'Ventas', 'fecha_contratacion' => '2022-06-11', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202530', 'nombre_completo' => 'Patricia León', 'dni_nif' => '01209876D', 'telefono' => '699000111', 'correo' => 'patricia.leon@example.com', 'cargo' => 'Teleoperadora', 'departamento' => 'Ventas', 'fecha_contratacion' => '2021-10-10', 'fecha_fin' => null, 'estado' => 'activo'],

            
            // Departamento: Almacén
            ['legajo'=> '202531', 'nombre_completo' => 'Gustavo Peña', 'dni_nif' => '11308765E', 'telefono' => '600123000', 'correo' => 'gustavo.pena@example.com', 'cargo' => 'Encargado de Almacén', 'departamento' => 'Almacén', 'fecha_contratacion' => '2020-02-28', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202532', 'nombre_completo' => 'Lucía Bravo', 'dni_nif' => '12407654F', 'telefono' => '611234111', 'correo' => 'lucia.bravo@example.com', 'cargo' => 'Auxiliar de Almacén', 'departamento' => 'Almacén', 'fecha_contratacion' => '2022-05-10', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202533', 'nombre_completo' => 'Manuel Suárez', 'dni_nif' => '13506543G', 'telefono' => '622345222', 'correo' => 'manuel.suarez@example.com', 'cargo' => 'Operario de Logística', 'departamento' => 'Almacén', 'fecha_contratacion' => '2019-12-12', 'fecha_fin' => '2021-06-16', 'estado' => 'baja voluntaria'],
            ['legajo'=> '202534', 'nombre_completo' => 'Ángela Cordero', 'dni_nif' => '14605432H', 'telefono' => '633456333', 'correo' => 'angela.cordero@example.com', 'cargo' => 'Responsable de Inventario', 'departamento' => 'Almacén', 'fecha_contratacion' => '2023-04-01', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202535', 'nombre_completo' => 'Óscar Lozano', 'dni_nif' => '15704321I', 'telefono' => '644567444', 'correo' => 'oscar.lozano@example.com', 'cargo' => 'Mozo de Almacén', 'departamento' => 'Almacén', 'fecha_contratacion' => '2021-08-20', 'fecha_fin' => '2021-10-07', 'estado' => 'despido'],
            ['legajo'=> '202536', 'nombre_completo' => 'Carla Rivas', 'dni_nif' => '16803210J', 'telefono' => '655678555', 'correo' => 'carla.rivas@example.com', 'cargo' => 'Clasificadora', 'departamento' => 'Almacén', 'fecha_contratacion' => '2022-09-15', 'fecha_fin' => null, 'estado' => 'activo'],
            ['legajo'=> '202537', 'nombre_completo' => 'Tomás Delgado', 'dni_nif' => '17902109K', 'telefono' => '666789666', 'correo' => 'tomas.delgado@example.com', 'cargo' => 'Supervisor de Almacén', 'departamento' => 'Almacén', 'fecha_contratacion' => '2020-03-03', 'fecha_fin' => null, 'estado' => 'excedencia'],

        ];

        // Obtener el id del usuario para cada empleado
        foreach ($empleados as &$empleado) {
            $user = DB::table('users')->where('email', $empleado['correo'])->first();
            if ($user) {
                $empleado['user_id'] = $user->id; // Asigna el user_id correspondiente
            }
        }

        // Insertar los empleados con el user_id
        DB::table('empleados')->insert($empleados);
    }
}
