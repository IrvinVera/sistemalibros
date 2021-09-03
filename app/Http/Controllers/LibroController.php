<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use App\Categoria;
use App\User;
use DB;

class LibroController extends Controller
{
    
    public function vistaRegistrarLibro(){

        return view('Libros.registrar-libros');

    }

    public function vistaActualizarLibro(Request $request){

        $id = intval($request->idLibro);
        
        $datosLibro = Libro::find($id);
        
        // dd($datosLibro['id']);

        return view('Libros.editar-libro')->with('datosLibro',$datosLibro);

    }


    public function obtenerLibros(){

        $lista_libros = array(); 

        $librosEncontrados = Libro::all();

        foreach ($librosEncontrados as $libro ) {
            
            $acciones = '
            <a href ="'.route('vista-actualizar-libro', $libro->id).'">
                <button type="button" name="'.$libro->id.'" class="btn" data-toggle="tooltip" data-placement="top" title="Editar libro">
                    <i class="nav-icon i-Male-21" style="font-size: 15px;"></i>
                </button>
            </a>

            <a>
                <button type="button" name="'.$libro->id.'" class="btn btnDisponibilidad" data-toggle="tooltip" data-placement="top" title="Cambiar disponibilidad">
                    <i class="nav-icon i-Key" style="font-size: 15px;"></i>
                </button>
            </a>

            <a>
                <button type="button" name="'.$libro->id.'" class="btn btnEliminar" data-toggle="tooltip" data-placement="top" title="Eliminar libro">
                    <i class="i-Close" style="font-size: 18px;"></i>
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

            $categoria = Categoria::find($libro->id_categoria);

            array_push($lista_libros, array(
                'nombre'=>$libro->nombre,
                'autor'=>$libro->autor,
                'fecha'=>$libro->fecha_publicacion,
                'categoria'=>$categoria->nombre,
                'disponible'=>$libroDisponible,
                'adquiridor'=>$adquiridor,
                'Acciones'=>$acciones, 

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
                $libro->id_categoria = $request->categoria;
                $libro->save();
                $respuesta = 1;

            } catch (\PDOException $e) {

                return $e->getMessage   (); 
                $respuesta = 2;

            }

        return $respuesta;


    }

}
