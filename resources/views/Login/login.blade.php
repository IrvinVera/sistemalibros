<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Librería</title>
    <link rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-purple.min.css')}}">
    <link rel="stylesheet" href="{{ asset('Personal/css/estilosDU.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Personal/css/cssErrorUsuario.css') }}">
    <style>
        a:not([href]):not([tabindex]):hover {
            color: white!important;
        }

        .column {
            float: left;
            width: 50%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

    </style>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

<body>
    <div class="auth-layout-wrap" style="background-image: url({{asset('Personal/imagenes/fondoLogin.jpg')}})">
        <div class="auth-content tarjetaLogin">
            <div class="card o-hidden col-md-10">
                <div class="row col-md-13 ">
                    <div class="col-md-12">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <!-- <img src="FGE_Favion-300x300.png" alt="10"> -->
                            </div>
                            <div class="auth-logo text-center mb-4">
                                <h1 class="mb-3 text-30">Sistema de librería</h1>
                            </div>
                            <form method="POST" action="{{ route('login.post') }}">
                            @csrf
                                <div class="form-group">
                                    <label for="login">Usuario:</label>
                                    <input id="usuario" name="correo" type="email" class="form-control @error('correo') is-invalid @enderror" name="correo"  required autocomplete="off" >
                                    @if ($errors->has('username') || $errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña:</label>
                                    <input id="contraseña" name="password" type="password" class="form-control @error('contraseña') is-invalid @enderror" name="password" required autocomplete="off">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-block mt-2">Acceder</button>
                                </div>
                                <br>

							@if(session()->has('error'))	
							<div class=" alert alert-danger" role="alert" style="text-align:center;">Los datos ingresados son incorrectos</div>
							@endif  
                            </form>
                               
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div> 

    <script src="{{asset('assets/js/common-bundle-script.js')}}"></script> 
    <script src="{{asset('assets/js/script.js')}}"></script>

</body>
</html>