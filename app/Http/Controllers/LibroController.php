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

        return view('Libros.editar-libro')->with('datosLibro',$datosLibro);

    }


    public function obtenerLibros(){

        $lista_libros = array(); 

        $librosEncontrados = Libro::all();

        foreach ($librosEncontrados as $libro ) {
            
            $acciones = '
            <a href ="'.route('vista-actualizar-libro', $libro->id).'">
                <button type="button" name="'.$libro->id.'" class="btn" data-toggle="tooltip" data-placement="top" title="Editar libro">
                    <i class="nav-icon i-Edit" style="font-size: 15px;"></i>
                </button>
            </a>


            ';

            if($libro->disponible == 0){

                $acciones = $acciones.'
                <a>
                    <button type="button" name="'.$libro->id.'" class="btn btnEliminar" data-toggle="tooltip" data-placement="top" title="Eliminar libro">
                        <i class="i-Close" style="font-size: 18px;"></i>
                    </button>
                </a>
                
                <a>
                <button type="button" name="'.$libro->id.'" class="btn btnDisponibilidad" data-toggle="tooltip" data-placement="top" title="Cambiar disponibilidad">
                    <i class="nav-icon i-File-Bookmark" style="font-size: 15px;"></i>
                </button>
            </a>';

            }else{

                $acciones = $acciones.'
                <a>
                    <button type="button" name="'.$libro->id.'" class="btn btnEntregarLibro" data-toggle="tooltip" data-placement="top" title="Entregar libro">
                        <i class="i-Back1" style="font-size: 18px;"></i>
                    </button>
                </a>';
                

            }

                $usuario_Adquiriente = "";

                if($libro->disponible == 0){

                    $libroDisponible = "Si";

                }else{

                    $usuario_Adquiriente = $libro->nombre_adquiriente;
                    $libroDisponible = "No";

                }

            $categoria = Categoria::find($libro->id_categoria);

            array_push($lista_libros, array(
                'nombre'=>$libro->nombre,
                'autor'=>$libro->autor,
                'fecha'=>$libro->fecha_publicacion,
                'categoria'=>$categoria->nombre,
                'disponible'=>$libroDisponible,
                'adquiridor'=>$usuario_Adquiriente,
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
                $libro->disponible = 0;
                $libro->save();
                $respuesta = 1;

            } catch (\PDOException $e) {

                return $e->getMessage   (); 
                $respuesta = 2;

            }

        return $respuesta;


    }


    public function actualizarLibro(Request $request){

        $respuesta = 0;

        try {
            
            $libro = Libro::find(intval($request->idLibro));

            $libro->nombre =  $request->nombre;
            $libro->autor =$request->autor;
            $libro->fecha_publicacion =$request->fecha;
            $libro->id_categoria = $request->categoria;

            $libro->save();

            $respuesta = 1;

        } catch (\PDOException $e) {
            DB::rollback();
            return $e->getMessage   (); 
            $respuesta = 2;
        }
        
        
        return $respuesta;


    }


    public function eliminarLibro(Request $request){

        $respuesta = 0;
    
        try{

            DB::beginTransaction();

            $libro = Libro::find(intval($request->id));

            $libro ->delete();

            DB::commit();
            $respuesta = 1; 

        }catch(\PDOException $e){
            DB::rollback();
            return $e->getMessage   (); 
            $respuesta = 2;
        }

        return $respuesta;

    }


    public function cambiarDisponibilidad(Request $request){
        
        $respuesta = 0;
        
        try{

        $libro = Libro::find(intval($request->id));
        $libro->disponible = 1;
        $libro->nombre_adquiriente = $request->nombre_adquiriente;
        $libro->save();

        $respuesta = 1; 

        }catch(\PDOException $e){
            DB::rollback();
            return $e->getMessage   (); 
            $respuesta = 2;
        }

        return $respuesta;

    }

    public function entregarLibro(Request $request){

        $respuesta = 0;
        
        try{

        $libro = Libro::find(intval($request->id));
        $libro->disponible = 0;
        $libro->nombre_adquiriente = NULL;
        $libro->save();

        $respuesta = 1; 

        }catch(\PDOException $e){
            DB::rollback();
            return $e->getMessage   (); 
            $respuesta = 2;
        }

        return $respuesta;

    }

}
