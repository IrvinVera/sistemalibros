<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Categoria;

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
        $user->correo            = 'usuario1@gmail.com';
        $user->password         = bcrypt('primerusuario');
        $user->save();

        $user = new User();
        $user->correo            = 'usuario2@gmail.com';
        $user->password         = bcrypt('segundousuario');
        $user->save();

        $categoria = new Categoria();
        $categoria->nombre = "Terror";
        $categoria->descripcion = "
        El cine de terror es un género cinematográfico que se caracteriza por su voluntad de provocar en el espectador sensaciones de pavor, terror, miedo, disgusto, repugnancia, horror, incomodidad o preocupación.";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = "Suspenso";
        $categoria->descripcion = "
        El suspenso, o thriller es un recurso literario cuyo objetivo principal es mantener al lector a la expectativa, generalmente en un estado de tensión, de lo que pueda ocurrirles a los personajes y, por lo tanto, atento al desarrollo del conflicto o nudo de la narración.";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = "Romantica";
        $categoria->descripcion = "
        El cine romántico es un género cinematográfico que se caracteriza por retratar argumentos construidos de eventos y personajes relacionados con la expresión del amor y las relaciones románticas. El cine romántico se centra en la representación de una historia amorosa de dos participantes, la cual atraviesa las principales etapas de la concepción del amor como el cortejo y el matrimonio .";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = "Comedia";
        $categoria->descripcion = "
        Una comedia cinematográfica es una película con situaciones de humor que intenta provocar la risa de la audiencia. Es uno de los más prolíficos y populares géneros cinematográficos.";
        $categoria->save();
    }
}
