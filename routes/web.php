<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('home');
        }else{
            return view('Login.login');
        }
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/ingresar', 'Auth\LoginController@loguearse')->name('login.post');

Route::get('registrar-libro','LibroController@vistaRegistrarLibro')->name('registrar-libro');

Route::get('obtener-libros','LibroController@obtenerLibros')->name('obtener-libros');  