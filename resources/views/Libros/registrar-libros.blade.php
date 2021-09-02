@extends('layouts.admin.template')
@section('page-css')

<link rel="stylesheet" type="text/css" href="{{ asset('Personal/css/cssErrorUsuario.css') }}">

@endsection

@section('content')
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <form id="formRegistroNuevoLibro" >
                    {{ csrf_field() }}
                    <div class="container">
                        <h4>Registrar Libro</h4>
                        <hr>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control form-control-rounded" name="nombre" id="idNombre" type="text" maxlength="50" data-validation="custom required" data-validation-regexp="^([a-z-A-Z\s-ZñÑáéíóúÁÉÍÓÚ]+)$" required/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="autor">Autor</label>
                                <input type="text" class="form-control form-control-rounded" name="autor" id="idAutor" type="text" maxlength="50" data-validation="custom required" data-validation-regexp="^([a-z-A-Z\s-ZñÑáéíóúÁÉÍÓÚ]+)$" required/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fecha">Fecha de publicacción</label>
                                <input class="form-control form-control-rounded" name="fecha" id="idFecha" maxlength="100" type="date" data-validation="email" required/> 
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="categoria">Categoría</label>
                                <select class="form-control form-control-rounded" id="categoria" name="categoria" style="width:100%;" required>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top:20px;" >
                        <button type="submit" style="float:right" class="btn btn-primary" id="btnGuardar">Guardar</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
@endsection

@section('page-js')
<!-- <script type="text/javascript" src="...path-to/jquery.validation/1.15.0/jquery.validate.js" /> -->
<!-- <script type="text/javascript" src="...path-to/jquery-validation/localization/messages_es.js" /> -->
<script src="{{ asset('Plugins/validator/jquery.validate.min.js')}}" ></script> 
<script src="{{asset ('Personal/js/vista-registrar-libros.js')}}"></script> 

@endsection