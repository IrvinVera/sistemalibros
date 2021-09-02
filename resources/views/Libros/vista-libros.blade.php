@extends('layouts.admin.template')

@section('page-css')
    <link href="{{ asset('Plugins/DataTable/css/datatables2.min.css') }}" rel="stylesheet">

@endsection

@section('content')
    <div class="col-md-12">
    <div class="row justify-content-center my-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <input type="hidden" class="valor" value="">
                    <button type="button" class="agregarLibro btn btn-primary btn-sm"  style="float: right;">
                        <i class="i-File-Clipboard-File--Text mr-1" style="font-size:18px;"></i>
                        Agregar libro
                    </button>
                </div>
                <div class="card-body">
                <div class=" table-responsive">
                        <table class="table w-100 align-middle table-hover" id="TablaLibros">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Autor</th>
                                    <th scope="col">Fecha Publicacion</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Disponible</th>
                                    <th scope="col">Adquiridor</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cambiar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label >Nueva contraseña</label>
                                <input type="text" class="form-control form-control-rounded" name="primerContraseña" id="primerContraseña" maxlength="30" data-validation="custom required" data-validation-regexp="^([a-z-A-Z\s-ZñÑáéíóúÁÉÍÓÚ]+)$"/>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label >Confirmar nueva contraseña </label>
                                <input class="form-control form-control-rounded" name="segundaContraseña" id="segundaContraseña" maxlength="30" type="text" data-validation="custom required" data-validation-regexp="^([a-z-A-Z\s-ZñÑáéíóúÁÉÍÓÚ]+)$" data-validation="length" data-validation-length="max25" />
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="idCambioContraseña"/>
                    <input type="hidden" id="idUsuarioCarpeta"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="cambiarContraseña()">Cambiar Contraseña</button>
            </div>
            </div>
        </div>
    </div> -->


@endsection
@section('page-js')
    <script>
        var routeBase			    = '{!! url('') !!}';
        $(".agregarLibro").click(function(e){
            location.href = "{{route('registrar-libro')}}";
        });


    </script>

    <script src="{{asset ('Plugins/DataTable/js/datatables.min.js')}}"></script>
    <script src="{{asset ('Personal/js/vista-libros.js')}}"></script>
    @endsection


    