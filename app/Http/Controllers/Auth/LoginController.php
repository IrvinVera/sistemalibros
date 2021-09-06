<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loguearse(){



        $tipoAcceso = $_POST['correo'];
        $contraseña = $_POST['password'];

            $datosUsuario = array (
                'correo' => $tipoAcceso,
                'password'=> $contraseña
            );  
            
            // dd($datosUsuario);

            if(Auth::attempt($datosUsuario)){
                return redirect()->route('home');
            }else{
                return back()->with('error','error');
            }

    }

    public function mostrarLogin(){

        return view('Login.login');

    }

}
