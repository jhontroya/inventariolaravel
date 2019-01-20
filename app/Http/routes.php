<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});

//rutas para poder ingresar al modulo de bodega
Route::resource('almacen/categoria','CategoriaController');
Route::resource('almacen/articulo','ArticuloController');

//rutas para poder ingresar al modulo de compras
Route::resource('compras/ingreso','IngresoController');
Route::resource('compras/proveedor','ProveedorController');

//rutas para poder ingresar al modulo de salidas
Route::resource('salidas/egreso','EgresoController');
Route::resource('salidas/entrenador','EntrenadorController');

//rutas para poder ingresar al modulo de acceso
Route::resource('acceso/usuario','UsuarioController');

//ruta que gestiona el acceso a nuestra aplicacion
Route::auth();

//ruta que nos redirige al home de la aplicacion
Route::get('/home', 'HomeController@index');

//routa que me lleva al inicio de la alicacion
Route::get('bienvenida', function(){
  return view('layouts.inicio');

  //ruta que nos redirige al home de la aplicacion en caso de q la url
  //q se encuentra en el navegador no exista
Route::get('/{slug?}', 'HomeController@index');
});
