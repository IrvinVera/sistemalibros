<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;

class LibroController extends Controller
{
    
    public function vistaRegistrarLibro(){

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

}
