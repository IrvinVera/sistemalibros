<div class="main-header" style="background-color:#227DC6">

            <div class="d-flex align-items-center">
               
            </div>

            <div style="margin: auto"></div>
            <div class="header-part-right">                
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                    <a class="navbar-brand" style="color:black" href="{{ route('home') }}">INICIO</a>
                    </div>
                </div>
            </div>
            @role('CLIENTE')
            <div class="header-part-right">                
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                    <a class="navbar-brand" style="color:black" href="{{ route('carpeta-cliente') }}">MI CARPETA</a>
                    </div>
                </div>
            </div>
            <div class="header-part-right">                
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                    <a class="navbar-brand" style="color:black" href="{{ route('mensajes-cliente') }}">SUGERENCIAS</a>
                    </div>
                </div>
            </div>
            <div class="header-part-right">                
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                    <a class="navbar-brand" style="color:black" href="{{ route('subir-documento-cliente') }}">SUBIR DOCUMENTO</a>
                    </div>
                </div>
            </div>
            @endrole
            @role('ADMINISTRADOR')
            <div class="header-part-right">                
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                    <a class="navbar-brand" style="color:black" href="{{ route('responsables') }}">RESPONSABLES</a>
                    </div>
                </div>
            </div>
            @endrole

            @role('ADMINISTRADOR')
            <div class="header-part-right">                
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                    <a class="navbar-brand" style="color:black" href="{{ route('clientes') }}">CLIENTES</a>
                    </div>
                </div>
            </div>

            <div class="header-part-right">                
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                    <a class="navbar-brand" style="color:black" href="{{ route('mostrar-mensajes') }}">SUGERENCIAS</a>
                    </div>
                </div>
            </div>

            <div class="header-part-right">                
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                    <a class="navbar-brand" style="color:black" href="{{ route('mostrar-solicitudes') }}">SOLICITUDES</a>
                    </div>
                </div>
            </div>
            @endrole
            @role('RESPONSABLE')
            <div class="header-part-right">                
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                    <a class="navbar-brand" style="color:black" href="{{ route('clientes') }}">CLIENTES</a>
                    </div>
                </div>
            </div>
            <div class="header-part-right">                
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                    <a class="navbar-brand" style="color:black" href="{{ route('mostrar-formatos') }}">FORMATOS</a>
                    </div>
                </div>
            </div>
            @endrole
            <div class="header-part-right">                
                <!-- User avatar dropdown -->
                @role('ADMINISTRADOR')
                <div class="dropdown">
                    <div  class="user col align-self-end">
                    <i  style="color:black;font-size:30px;cursor:pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img alt="" id="imagen1" src="{{ asset('imagenes/campana.png') }}" style="height:38px; width:38px" /></i>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                            </div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#modalNotificaciones" style="cursor:pointer;">Mis notificaciones</a>
                        </div>
                    </div>
                </div>
                @endrole
                @role('RESPONSABLE')
                <div class="dropdown">
                    <div  class="user col align-self-end">
                        <i  style="color:black;font-size:30px;cursor:pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img alt="" id="imagen1" src="{{ asset('imagenes/campana.png') }}" style="height:38px; width:38px" /></i>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                            </div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#modalNotificaciones" style="cursor:pointer;">Mis notificaciones</a>
                        </div>
                    </div>
                </div>
                @endrole
                <div class="dropdown">
                    <div  class="user col align-self-end">
                        <i class="i-Male-21" style="color:black;font-size:30px;cursor:pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                            <i class="i-Lock-User mr-1" style="font-size: 18px;"></i>
                            </div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#logoutmodal" style="cursor:pointer;">Cerrar sesión</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="logoutmodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered justify-content-center" role="document">
              <div class="modal-content rounded border border-white col-md-12 px-0">
                <div class="modal-header justify-content-center" style="background-color:#227DC6;">
                    <h4 style="color:#ffff;"> <i class="nav-icon i-Power-3"></i><strong> Salir</strong></h4>
                </div>
                <div class="modal-body text-center">
                    <h4><i class="fa fa-sign-out"></i> <strong> ¿Desea cerrar sesión? </strong></h4>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary col " data-dismiss="modal" >Cancelar</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-primary col">Salir</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade " id="modalNotificaciones" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered justify-content-center" role="document">
              <div class="modal-content rounded border border-white col-md-12 px-0">
                <div class="modal-header justify-content-center" style="background-color:#227DC6;">
                    <h4 style="color:#ffff;"> <i class="nav-icon"></i><strong>PRÓXIMOS ACUERDOS</strong></h4>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <!-- asdad -->
                <div id="divNotificaciones"></div>
              </div>
            </div>
          </div>
        <!-- header top menu end -->