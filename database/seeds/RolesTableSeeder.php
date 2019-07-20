<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guard = 'api';

        \Spatie\Permission\Models\Role::findOrCreate('admin', $guard);

        \Spatie\Permission\Models\Role::findOrCreate('moderator', $guard);

        \Spatie\Permission\Models\Role::findOrCreate('user', $guard);
    }
}
