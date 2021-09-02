<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use App\User;
use DB;

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

            $libroDisponible = false;
            $adquiridor = "";



            if($libro->usuario_adquiriente == NULL){

                $libroDisponible = "Si";

            }else{
                $usuario_Adquiriente = User::find($libro->usuario_adquiriente);
                $adquiridor = $usuario_Adquiriente->nombre;
                $libroDisponible = "No";
                
            }


            array_push($lista_libros, array(
                'nombre'=>          $libro->nombre,
                'autor'=>          $libro->autor,
                'fecha'=>         $libro->fecha_publicacion,
                'categoria'=>       1,
                'disponible'=>          $libroDisponible,
                'adquiridor'=>          $adquiridor,
                'Acciones'=>        $acciones, 

            ));

        }

        return response()->json(['response' => 'success', 'status' => 1, 'data' => ($lista_libros)],200);



    }


    public function crearLibro(Request $request){
 
        $respuesta = 0;

            try {

                $libro = new Libro();
                $libro->nombre = $request->nombre;
                $libro->autor = $request->autor;
                $libro->fecha_publicacion = $request->fecha;
                $libro->id_categoria = 1;
                $libro->save();
                $respuesta = 1;

            } catch (\PDOException $e) {

                return $e->getMessage   (); 
                $respuesta = 2;

            }

        return $respuesta;


    }

}
