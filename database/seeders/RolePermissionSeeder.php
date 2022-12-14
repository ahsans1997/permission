<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role Create
        $superadmin = Role::create(['name' => 'superadmin']);
        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);
        $user = Role::create(['name' => 'user']);



        // Permissions list in array
        $permissions = [
            //dashboard
            'dashboard',

            //Superadmin Permission
            'superadmin.create',
            'superadmin.view',
            'superadmin.edit',
            'superadmin.delete',
            'superadmin.approve',

            //Admin Permission
            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.delete',

            //Admin Profile Permission
            'adminprofile.view',
            'adminprofile.edit',

            //Editor Permission
            'editor.create',
            'editor.view',
            'editor.edit',

            //Editor Profile Permission
            'editorprofile.view',
            'editorprofile.edit',

            //User Permission
            'user.view',
        ];

        //Create and Assain Permission

        foreach($permissions as $permission)
        {
            $permission = Permission::create(['name' => $permission]);
            $superadmin->givePermissionTo($permission);
        }
    }
}
