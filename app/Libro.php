<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table ='libros';
    protected $fillable =[
        'id',
        'nombre',
        'autor',
        'fecha_publicacion',
        'disponible',
        'nombre_adquiriente',
    ];
}
