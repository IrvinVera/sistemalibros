<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    @routes
  
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('Personal/css/cssfonts.css') }}">        
    <link rel="stylesheet" href="{{ asset('Personal/css/estilosDU.css') }}">
 
    <link rel="stylesheet" type="text/css" href="{{ asset('Plugins/fontawesome-free-5.11.2-web/css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Plugins/fontawesome-free-5.11.2-web/css/solid.css')}}">

    <link href="{{ asset('gral_admin/dist-assets/css/themes/lite-purple.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('gral_admin/dist-assets/css/plugins/perfect-scrollbar.min.css') }}" rel="stylesheet" />

    
    <link href="{{ asset('Plugins/sweetalert2/css/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Plugins/Bootstrap/css/bootstrap-select.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('gral_admin/dist-assets/css/plugins/toastr.css')}}">

    @yield('page-css')
    <style>
        
		@-webkit-keyframes color_change {
		  from { color: #5E3327; }
		  to { color: #fff; }
		}
		@-moz-keyframes color_change {
		  from { color: #5E3327; }
		  to { color: #fff; }
		}
		@-ms-keyframes color_change {
		  from { color: #5E3327; }
		  to { color: #fff; }
		}
		@-o-keyframes color_change {
		  from { color: #5E3327; }
		  to { color: #fff; }
		}
		@keyframes color_change {
		  from { color: #5E3327; }
		  to { color: #fff; }
		}

		.notificacion {
		    /* background-color: blue;
		    border: 5px solid white;
		    border-radius: 50px;
		    width: 50px;
		    height: 50px; */
		   -webkit-animation: color_change 1s infinite alternate;
		   -moz-animation: color_change 1s infinite alternate;  
		   -ms-animation: color_change 1s infinite alternate;  
		   -o-animation: color_change 1s infinite alternate;  
		   animation: color_change 1s infinite alternate;   
		}
    
    </style>
   
</head>
<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
 
        <div class="main-content-wrap sidenav-close d-flex flex-column">
            <div class="main-content">
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    @yield('content')
                </div>
            </div>
          
        </div>


    </div>
    @include('layouts.admin.sections.search-ui')
    <script src="{{ asset('Plugins/jQuery/jquery-3.4.1.slim.min.js')}}"></script>
    

    <script>
        var routeBase = '{!! url('') !!}'
    </script>
    <script src="{{ asset('gral_admin/dist-assets/js/plugins/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('gral_admin/dist-assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('gral_admin/dist-assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('gral_admin/dist-assets/js/scripts/script.min.js') }}"></script>
    <script src="{{ asset('gral_admin/dist-assets/js/scripts/sidebar.large.script.js') }}"></script>
    <script src="{{asset ('Plugins/sweetalert2/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset ('Plugins/Bootstrap/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('gral_admin/dist-assets/js/plugins/toastr.min.js')}}"></script>
    <script>
   

    </script>
    @yield('page-js')

      

</body>
</html>
