<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class TableRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         //creación de roles
        $adminRole    = Role::create(['name' => 'Admin' ]);
        $juzgadoRole     = Role::create(['name' => 'Juzgado' ]);
        $externoRole  = Role::create(['name' => 'Externo' ]);


        //creación de usuarios        
        User::create([
            'name' => 'Luis Fax',
            'email' => 'luisfaax@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '351159550',
            'role' => $adminRole->id,
        ]);
        User::create([
            'name' => 'Melisa Albahat',
            'email' => 'melisa@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => $juzgadoRole->id,
        ]);
        User::create([
            'name' => 'Ruben',
            'email' => 'ruben@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => $externoRole->id,
        ]);
        



       
        


        //creación de permisos:
        //radicaciones
        Permission::create(['name' => 'radicar_create']);
        Permission::create(['name' => 'radicar_edit']);
        Permission::create(['name' => 'radicar_destroy']);
        Permission::create(['name' => 'radicar_search']);
        Permission::create(['name' => 'radicar_change_estatus']);
        Permission::create(['name' => 'radicar_view']);
        
        //actuaciones
        Permission::create(['name' => 'actuaciones_search']);
        Permission::create(['name' => 'actuaciones_view']);

        //historiales
        Permission::create(['name' => 'historiales_search']);
        Permission::create(['name' => 'historiales_view']);

        //memoriales
        Permission::create(['name' => 'memoriales_create']);
        Permission::create(['name' => 'memoriales_search']);
        Permission::create(['name' => 'memoriales_view']);

        //estadisticas
        Permission::create(['name' => 'estadisticas_view']);

        //usuarios
        Permission::create(['name' => 'users_create']);
        Permission::create(['name' => 'users_update']);
        Permission::create(['name' => 'users_destroy']);
        Permission::create(['name' => 'users_edit']);
        Permission::create(['name' => 'users_search']);
        Permission::create(['name' => 'users_view']);

        //roles
        Permission::create(['name' => 'roles_create']);
        Permission::create(['name' => 'roles_update']);
        Permission::create(['name' => 'roles_destroy']);
        Permission::create(['name' => 'roles_edit']);
        Permission::create(['name' => 'roles_search']);
        Permission::create(['name' => 'roles_view']);

        //permisos
        Permission::create(['name' => 'permisos_create']);
        Permission::create(['name' => 'permisos_update']);
        Permission::create(['name' => 'permisos_destroy']);
        Permission::create(['name' => 'permisos_edit']);
        Permission::create(['name' => 'permisos_search']);
        Permission::create(['name' => 'permisos_view']);

         //asigaciones
        Permission::create(['name' => 'asignaciones_syncalll']);
        Permission::create(['name' => 'asignaciones_revokeall']);
        Permission::create(['name' => 'asignaciones_syncone']);
        Permission::create(['name' => 'asignaciones_view']);

        //catalogos
        Permission::create(['name' => 'catalogos_view']);
        
        
        
        









        //asignar permisos al role Admin       
        $allPermissions  = Permission::pluck('id')->toArray();
        $adminRole->syncPermissions($allPermissions);

                   
        



        //asignar roles
        $userAdmin = User::find(1);
        $userAdmin->assignRole('Admin');

        $userJuzgado = User::find(2);
        $userJuzgado->assignRole('Juzgado');

        $userExterno = User::find(3);
        $userExterno->assignRole('Externo');

    }
}
