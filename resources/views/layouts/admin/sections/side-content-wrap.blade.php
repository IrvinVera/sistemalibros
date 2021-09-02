    <!-- sectiion side-content-wrap -->
    <style>

    .nav-text{
        style: color: black;
    }
        
    </style>
    <div class="side-content-wrap">
        <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
            <ul class="navigation-left">
                <li class="nav-item {{ Request::is('home') || Request::is('home/*') ? 'active' : '' }}">
                    <a class="nav-item-hold" href="{{ route('home') }}" style="color:#5E3327;">
                        <i class="nav-icon i-Home1" style="color: black;"></i>
                        <span class="nav-text" style="color: black;">Inicio</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                @role('ADMINISTRADOR')
                
                <li class="nav-item {{ Request::is('usuarios') || Request::is('usuarios/*') ? 'active' : '' }}">
                        <a class="nav-item-hold" href="{{ route ('vista-usuarios')}}" style="color:#5E3327;">
                            <i class="nav-icon i-Business-Mens"  style="color: black;"></i>
                            <span class="nav-text" style="color: black;">Administradores</span>
                        </a>
                        <div class="triangle"></div>
                    </li> 
                <li class="nav-item {{ Request::is('residentes') || Request::is('residentes/*') ? 'active' : '' }}">
                        <a class="nav-item-hold" href="{{ route ('vista-residentes')}}" style="color:#5E3327;">
                            <i class="nav-icon i-Mens"  style="color: black;"></i>
                            <span class="nav-text" style="color: black;">Residentes</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item {{ Request::is('vigilantes') || Request::is('vigilantes/*') ? 'active' : '' }}">
                        <a class="nav-item-hold" href="{{ route ('vista-vigilantes')}}" style="color:#5E3327;">
                            <i class="nav-icon i-Police"  style="color: black;"></i>
                            <span class="nav-text" style="color: black;">Vigilantes</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <!-- <li class="nav-item {{ Request::is('mensajes') || Request::is('mensajes/*') ? 'active' : '' }}">
                        <a class="nav-item-hold" href="{{ route ('vista-nuevo-mensaje')}}" style="color:#5E3327;">
                            <i class="nav-icon i-Email"  style="color: black;"></i>
                            <span class="nav-text" style="color: black;">Mensajes</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                   -->
                    <!-- <li class="nav-item {{ Request::is('menuGraficas') ? 'active' : '' }}">
                        <a class="nav-item-hold" href="" style="color:#5E3327;">
                            <i class="nav-icon i-Letter-Open"></i>
                            <span class="nav-text">Visitas</span>
                        </a>
                        <div class="triangle"></div>
                    </li> -->
                    @endrole

                    @role('RESIDENTE')
                    <li class="nav-item {{ Request::is('vista-nueva-visita') ? 'active' : '' }}">
                        <a class="nav-item-hold" href="vista-nueva-visita" style="color:#5E3327;">
                            <i class="nav-icon i-Folder-With-Document"></i>
                            <span class="nav-text">Nueva visita</span>
                        </a>
                        <div class="triangle"></div>
                    </li>

                    <li class="nav-item {{ Request::is('vista-mis-mensajes') || Request::is('vista-mis-mensajes/*') ? 'active' : '' }}">
                        <a class="nav-item-hold" href="{{ route ('vista-mis-mensajes')}}" style="color:#5E3327;">
                            <i class="nav-icon i-Email"  style="color: black;"></i>
                            <span class="nav-text" style="color: black;">Mis Mensajes</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    
                    
                    <!-- <li class="nav-item {{ Request::is('menuGraficas') ? 'active' : '' }}">
                        <a class="nav-item-hold" href="" style="color:#5E3327;">
                            <i class="nav-icon i-Folder-Search"></i>
                            <span class="nav-text">Mis visitas</span>
                        </a>
                        <div class="triangle"></div>
                    </li> -->
                    
                    <!-- <li class="nav-item {{ Request::is('vista-residentes-registrados') ? 'active' : '' }}">
                        <a class="nav-item-hold" href="vista-residentes-registrados" style="color:#5E3327;">
                            <i class="nav-icon i-Add-User"></i>
                            <span class="nav-text">Agregar residente</span>
                        </a>
                        <div class="triangle"></div>
                    </li> -->
                    @endrole
                    
                  

                <li class="nav-item">
                    <a  class="nav-item-hold"  data-toggle="modal" data-target="#logoutmodal" style="color:#227DC6;" >
                        <i class="nav-icon i-Door"  style="color: black;"></i>
                        <span class="nav-text" style="color: black;">Cerrar Sesión</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            </ul>
        </div>
    </div>

