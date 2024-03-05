<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           // Crea un usuario de ejemplo
           $user = User::create([
            'personal_id'=>'1',
            'email' => 'admin@edusys.com',
            'password' => bcrypt('admin2024'), // Cambia esto por la contraseña que desees
            
        ]);


        // Asigna el rol de administrador al usuario
        $adminRole = Role::where('name', 'Administrador')->first();
        $user->assignRole($adminRole);
       
         // Asigna los permisos directamente al rol
         $adminRole->givePermissionTo('admin.usuarios.index');
         $adminRole->givePermissionTo('admin.usuarios.edit');
         $adminRole->givePermissionTo('admin.usuarios.destroy');

    }
}
