<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guard = 'api';

        // users
        \Spatie\Permission\Models\Permission::findOrCreate('create user', $guard);
        \Spatie\Permission\Models\Permission::findOrCreate('edit user', $guard);
        \Spatie\Permission\Models\Permission::findOrCreate('store user', $guard);
        \Spatie\Permission\Models\Permission::findOrCreate('update user', $guard);
        \Spatie\Permission\Models\Permission::findOrCreate('delete user', $guard);



        //breadpapers
        \Spatie\Permission\Models\Permission::findOrCreate('create breadpaper', $guard);
        \Spatie\Permission\Models\Permission::findOrCreate('edit breadpaper', $guard);
        \Spatie\Permission\Models\Permission::findOrCreate('store breadpaper', $guard);
        \Spatie\Permission\Models\Permission::findOrCreate('update breadpaper', $guard);
        \Spatie\Permission\Models\Permission::findOrCreate('delete breadpaper', $guard);
    }
}
