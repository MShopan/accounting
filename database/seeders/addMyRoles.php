<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class addMyRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = Role::create(['name'=>'writer']);
        $permission = Permission::create(['name'=>'edit post']);

        $role->givePermissionTo($permission);

        $user = User::find(1);
        $user->assignRole('writer');
    }
}
