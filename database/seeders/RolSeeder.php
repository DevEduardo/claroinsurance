<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            [
                'name' => 'Admin',
                'description' => 'Es el usuario registrado en la plataforma, con los permisos y privilegios necesarios para poder validar e ingresar los usuarios.'
            ],
            [
                'name' => 'Single',
                'description' => 'Es el usuario registrado en la platafoirma, con los permisos para enviar correos.'
            ],
        ]);
    }
}
