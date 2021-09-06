@extends('layouts.admin.template')
@section('page-css')

<link rel="stylesheet" type="text/css" href="{{ asset('Personal/css/cssErrorUsuario.css') }}">

@endsection

@section('content')
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <form id="formActualizarLibro" >
                    {{ csrf_field() }}
                    <div class="container">
                        <h4>Actualizar Libro</h4>
                        <hr>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" value="{{$datosLibro->nombre}}" class="form-control form-control-rounded" name="nombre" id="idNombre" type="text" maxlength="50" data-validation="custom required" required/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="autor">Autor</label>
                                <input type="text" value="{{$datosLibro->autor}}"  class="form-control form-control-rounded" name="autor" id="idAutor" type="text" maxlength="50" data-validation="custom required" required/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fecha">Fecha de publicacción</label>
                                <input class="form-control form-control-rounded" value="{{$datosLibro->fecha_publicacion}}"  name="fecha" id="idFecha" maxlength="100" type="date" data-validation="email" required/> 
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="categoria">Categoría</label>
                                <select class="form-control form-control-rounded" id="categoria" name="categoria" style="width:100%;" required>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input value="{{$datosLibro->id}}" class="form-control form-control-rounded" name="idLibro" id="idLibro" type="hidden"/>
                    <input value="{{$datosLibro->id_categoria}}" class="form-control form-control-rounded" name="categoriaSeleccionada" id="idCategoriaSeleccionada" type="hidden"/>
                    <input type="text" id="ruta" value="{{url('/')}}" style="display:none;!important">
                    <div class="col-md-6" style="margin-top:20px;" >
                        <button type="submit" style="float:right" class="btn btn-primary" id="btnGuardar">Guardar</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
@endsection

@section('page-js')
<script src="{{ asset('Plugins/validator/jquery.validate.min.js')}}" ></script> 
<script src="{{asset ('Personal/js/vista-editar-libro.js')}}"></script> 

@endsection