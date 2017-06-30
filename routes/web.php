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
    return view('index');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('empresa/index','EmpresaController@buscarsocio')->middleware('checkEmpresa');


Route::group(['middleware' => 'checkAdministrador'], function() {
	Route::get('admin/socio/buscarsocio', 'SocioController@buscarsocio');
	Route::get('admin/socio/informes', 'SocioController@informes');
	Route::get('admin/usuarios/', 'SocioController@verUsuarios');

	Route::post('admin/socio/informes','SocioController@actualizarEstado');
	Route::resource('admin/socio','SocioController');

});

Route::post('home','EjecutivoController@actualizarEstado');
Route::resource('ejecutivo','EjecutivoController');

Route::resource('mail','MailController');
// Route::resource('admin/','SocioController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
