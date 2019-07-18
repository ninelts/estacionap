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

    //
Route::middleware(['guest'])->group(function () {
    Route::get('/', 'guest\GuestController@start')->name('inicio');
    Route::get('/login', 'guest\GuestController@login')->name('login');
    Route::get('/registro', 'Auth\RegisterController@index')->name('registro');
});





/*RUTAS CON SESSION*/

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/roles', 'RolesController@index')->name('roles');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/conductor', 'conductorController@index')->name('conductor');
    Route::get('/recepcion', 'RecepcionController@index')->name('recepcion');



    /*RESERVA EXPRESS*/
    Route::get('/express', 'reserves\ExpressController@create')->name('express');

    /*RESERVA DIARIA*/

    Route::get('/diaria', 'reserves\DayliController@index')->name('vdiaria');
    Route::post('/diarias/', 'reserves\DayliController@create')->name('cdiaria');

    /*RESERVA MENSUAL*/

<<<<<<< HEAD
    //**CONDUCTOR */
    Route::get('reserva', 'user\UserController@reservation')->name('reserva');
    Route::get('/misreservas', 'user\UserController@myReservation')->name('misreservas');
    Route::get('datosUsuario', 'user\UserController@dateUser')->name('datosUsuario');
    Route::get('Registro/Automovil', 'user\RegisterCarController@index')->name('registro_automovil');

    //**ADMINISTRACION */


    Route::get('/administracion', 'admin\AdminController@index')->name('administracion');
    
    //**muestra listado usuarios */
    Route::get('/listadoUsuarios', 'admin\CrudUserController@index')->name('listado_usuarios');

    //** MUESTRA formulario agregar usuarios CAMBIAR NOMBRE DE FUNCION */
    Route::get('/agregarUsuarios', 'admin\CrudUserController@formAgregarUsuario')->name('agregar_usuarios');

    //**ELIMINA USUARIO*/
    Route::post('/eliminaUsuarios', 'admin\CrudUserController@deleteUsers')->name('eliminar_usuarios');
=======
    Route::get('reserva','user\UserController@reservation')->name('reserva');         
    Route::get('/misreservas','user\UserController@myReservation')->name('misreservas');
    Route::get('datosUsuario', 'user\UserController@dateUser')->name('datosUsuario');


    Route::get('/administracion', 'admin\AdminController@index')->name('administracion'); 
    //**el jquery se encarga de traer de getUser las variables a mostrar */
    Route::get('/dtbl.users', 'admin\AdminController@getUsers')->name('datatable.users');
    //**genera el pdf en base a la vista reporteUsuario.blade */
    Route::get('/pdf.users','admin\AdminController@pdfUsers')->name('pdf.users'); 
    /**genera el excel en base al modelo User */
    Route::get('/xlsx.users','admin\AdminController@xlsxExport')->name('xlsx.users'); 
>>>>>>> reserv

    //**almacena usuarios CAMBIAR NOMBRE DE FUNCION*/
    Route::post('/almacenaUsuarios', 'admin\CrudUserController@storeUsers')->name('almacenar_usuarios');

<<<<<<< HEAD
    //**almacena usuarios CAMBIAR NOMBRE DE FUNCION*/
    Route::post('/editaUsuarios', 'admin\CrudUserController@editUsers')->name('editar_usuarios');
=======

    Route::get('Registro/Automovil','user\RegisterCarController@index')->name('registro_automovil'); 
    Route::get('/lala','reserves\ExpressController@validates');

    Route::post('/ajaxQR','QrController@read')->name('ajaxQR');

>>>>>>> reserv

    //**el jquery se encarga de traer de getUser las variables a mostrar */
    Route::get('/dtbl.users', 'admin\CrudUserController@getUsers')->name('datatable.users');
    
    //**genera el pdf en base a la vista reporteUsuario.blade */
    Route::get('/pdf.users', 'admin\CrudUserController@pdfUsers')->name('pdf.users');

    /**genera el excel en base al modelo User */
    Route::get('/xlsx.users', 'admin\CrudUserController@xlsxExport')->name('xlsx.users');

    //**RECEPCION */
    Route::get('/qread', 'ReadqrController@read');
    Route::get('scanner', function () {
        return view('estacionapp.session.recepcion.lectorQr');
    })->name('scanner');
});
