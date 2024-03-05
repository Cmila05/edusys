<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea un permiso 
        Permission::create([
            'route' => 'Ver Usuarios',
            'name' => 'admin.usuarios.index',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Permission::create([
            'route' => 'Editar Usuarios',
            'name' => 'admin.usuarios.edit',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Permission::create([
            'route' => 'Eliminar Usuarios',
            'name' => 'admin.usuarios.destroy',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Permission::create([
            'route' => 'Crear Personal',
            'name' => 'admin.personal.create',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'route' => 'Editar Personal',
            'name' => 'admin.personal.edit',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'route' => 'Ver Personal',
            'name' => 'admin.personal.show',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
    }
}
