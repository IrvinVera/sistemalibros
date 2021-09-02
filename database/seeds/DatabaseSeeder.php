<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
   
        $user = new User();
        $user->nombre          = 'Emilio Zarate Guzman';
        $user->correo            = 'usuario1@gmail.com';
        $user->password         = bcrypt('primerusuario');
        $user->save();

        $user = new User();
        $user->nombre          = 'Juan Perez Solano';
        $user->correo            = 'usuario2@gmail.com';
        $user->password         = bcrypt('segundousuario');
        $user->save();
    }
}
