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

Auth::routes(['verify' => true]);

/*RUTAS SIN SESSION*/
Route::middleware(['guest'])->group(function () {
    Route::get('/', 'guest\GuestController@start')->name('inicio');
    Route::get('/login', 'guest\GuestController@login')->name('login');
    Route::get('/registro', 'Auth\RegisterController@index')->name('registro');
});





/*RUTAS CON SESSION*/

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/roles', 'RolesController@index')->name('roles');

    Route::get('/conductor', 'conductorController@index')->name('conductor');
    Route::get('/recepcion', 'RecepcionController@index')->name('recepcion');



    /*RESERVA EXPRESS*/
    Route::get('/express', 'reserves\ExpressController@create')->name('express');

    /*RESERVA DIARIA*/

    Route::get('/diaria', 'reserves\DayliController@index')->name('vdiaria');
    Route::post('/diarias/', 'reserves\DayliController@create')->name('cdiaria');

    /*RESERVA MENSUAL*/

    //**CONDUCTOR */
    Route::get('reserva', 'user\UserController@reservation')->name('reserva');
    Route::get('/misreservas', 'user\UserController@myReservation')->name('misreservas');
    Route::get('datosUsuario', 'user\UserController@dateUser')->name('datosUsuario');
    Route::get('Registro/Automovil', 'user\RegisterCarController@index')->name('registro_automovil');

    //**ADMINISTRACION */


    Route::get('/administracion', 'admin\AdminController@index')->name('administracion');
    
    //**muestra listado usuarios */
    Route::get('/listadoUsuarios', 'admin\AdminController@showUsers')->name('listado_usuarios');

    //**formulario agregar usuarios */
    Route::get('/agregarUsuarios', 'admin\AdminController@formAgregarUsuario')->name('agregar_usuarios');

    //**almacena usuarios */
    Route::post('/almacenaUsuarios', 'admin\AdminController@addUsers')->name('almacenar_usuarios');

    //**el jquery se encarga de traer de getUser las variables a mostrar */
    Route::get('/dtbl.users', 'admin\AdminController@getUsers')->name('datatable.users');
    
    //**genera el pdf en base a la vista reporteUsuario.blade */
    Route::get('/pdf.users', 'admin\AdminController@pdfUsers')->name('pdf.users');

    /**genera el excel en base al modelo User */
    Route::get('/xlsx.users', 'admin\AdminController@xlsxExport')->name('xlsx.users');

    //**RECEPCION */
    Route::get('/qread', 'ReadqrController@read');
    Route::get('scanner', function () {
        return view('estacionapp.session.recepcion.lectorQr');
    })->name('scanner');
});
