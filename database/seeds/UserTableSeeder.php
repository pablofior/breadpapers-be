<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::firstOrCreate(
            [
                'name' => 'admin',
                'email' => 'pabloribasfior@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123123'),
                'api_token' => hash('sha256', \Illuminate\Support\Str::random(60)),
            ]
        );
    }
}
