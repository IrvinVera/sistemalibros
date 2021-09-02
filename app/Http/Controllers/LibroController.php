<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;

class LibroController extends Controller
{
    
    public function vistaRegistrarLibro(){

        return view('Libros.registrar-libros');

    }

    public function obtenerLibros(){

        $lista_libros = array(); 

            $librosEncontrados = Libro::all();


        foreach ($librosEncontrados as $libro ) {
            
            $acciones = '
            <a>
            <button type="button" name="'.$libro->id.'" class="btn" data-toggle="tooltip" data-placement="top" title="Ver carpeta">
                <i class="nav-icon i-Folder-Archive" style="font-size: 15px;"></i>
            </button>
        </a>

        <a>
            <button type="button" name="'.$libro->id.'" class="btn btnAcuerdo" data-toggle="tooltip" data-placement="top" title="Agregar acuerdo">
                <i class="nav-icon i-Add-File" style="font-size: 15px;"></i>
            </button>
        </a>
                ';


            array_push($lista_libros, array(
                'nombre'=>          $libro->nombre,
                'autor'=>          $libro->autor,
                'fecha'=>         $libro->fecha_publicacion,
                'categoria'=>       1,
                'disponible'=>          $libro->usuario_adquiriente,
                'adquiridor'=>          1,
                'Acciones'=>        $acciones, 

            ));

        }

        return response()->json(['response' => 'success', 'status' => 1, 'data' => ($lista_libros)],200);



    }


    public function crearLibro(Request $request){
 
        $respuesta = 0;

                try {
            
                DB::beginTransaction();

                    $usuario = new user();
                    $usuario->usuario = $request->usuario;
                    $usuario->email = $request->correo;
                    $usuario->password = bcrypt($request->contrasena);
                    $usuario->save();

                    $persona_responsable = new PersonaCliente();
                    $persona_responsable->nombres_razonSocial = mb_strtoupper($request->nombre);
                    $persona_responsable->persona_contacto = mb_strtoupper($request->persona_contacto);
                    $persona_responsable->telefono = $request->telefono;
                    $persona_responsable->tipoUsuario = "CLIENTE";
                    $persona_responsable->id_usuario = $usuario->id;
                    $persona_responsable->id_responsable = auth()->user()['id'];
                    $persona_responsable->save();

                    $role_cliente = Role::find(3);
                    $usuario->roles()->attach($role_cliente); 


                    DB::commit();
                    $respuesta = 1;

                } catch (\PDOException $e) {
                    DB::rollback();
                    return $e->getMessage   (); 
                    $respuesta = 2;
                }




        return $respuesta;


    }

}
