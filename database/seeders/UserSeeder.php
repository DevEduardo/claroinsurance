<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => env('USER_ADMIN_EMAIL'),
            'email_verified_at' => now(),
            'password' => bcrypt(env('USER_ADMIN_PASSWORDS')),
        ]);
    }
}
