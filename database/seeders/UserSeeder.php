<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'phone' => '123123123',
            'identification_card' => '123456789',
            'date_of_birth' => '1986-01-28',
            'city' => 1, 
            'password' => bcrypt(env('USER_ADMIN_PASSWORD')),
        ]);
    }
}
