<?php

namespace App\Http\Controllers;
use App\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }
    
    public function listarCategorias(){

        $listaCategorias = Categoria::all();
        
        return $listaCategorias;

    }


}
