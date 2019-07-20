<?php

use Illuminate\Database\Seeder;

class UpdateAdminPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \Spatie\Permission\Models\Role::findByName('admin', 'api');

        $permissions = \Spatie\Permission\Models\Permission::all();

        $role->syncPermissions($permissions);

        $adminEmail = 'pabloribasfior@gmail.com';

        $admin = \App\Models\User::where('email', $adminEmail)->first();

        $admin->assignRole($role);
    }
}
