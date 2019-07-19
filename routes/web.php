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


    //**CONDUCTOR */
    Route::get('reserva', 'user\UserController@reservation')->name('reserva');
    Route::get('/misreservas', 'user\UserController@myReservation')->name('misreservas');
    Route::get('datosUsuario', 'user\UserController@dateUser')->name('datosUsuario');
    Route::get('Registro/Automovil', 'user\RegisterCarController@index')->name('registro_automovil');






    //**ADMINISTRACION */

    /*CRUD RESERVE*/
    Route::get('/listadoReservas', 'admin\CrudReserveController@index')->name('listado_reservas');

    //**almacena usuarios CAMBIAR NOMBRE DE FUNCION*/
    Route::post('/editaReservas', 'admin\CrudReserveController@editReserves')->name('editar_reservas');

    //**el jquery se encarga de traer de getUser las variables a mostrar */
    Route::get('/dtbl.reserves', 'admin\CrudReserveController@getReserves')->name('datatable.reserves');
    
    //**genera el pdf en base a la vista reporteUsuario.blade */
    Route::get('/pdf.reserves', 'admin\CrudReserveController@pdfReserves')->name('pdf.reserves');

    /**genera el excel en base al modelo User */
    Route::get('/xlsx.reserves', 'admin\CrudReserveController@xlsxExport')->name('xlsx.reserves');





    /*CRUD USER*/

    Route::get('/administracion', 'admin\AdminController@index')->name('administracion');
    
    //**muestra listado usuarios ACTIVOS */
    Route::get('/listadoUsuarios', 'admin\CrudUserController@index')->name('listado_usuarios');

    //**muestra listado usuarios INACTIVOS */
    Route::get('/listadoUsuariosInactivos', 'admin\CrudUserController@indexDesactivados')->name('listado_usuarios_desactivados');

    //** MUESTRA formulario agregar usuarios CAMBIAR NOMBRE DE FUNCION */
    Route::get('/agregarUsuarios', 'admin\CrudUserController@formAgregarUsuario')->name('agregar_usuarios');

    //**ELIMINA USUARIO*/
    Route::post('/eliminaUsuarios', 'admin\CrudUserController@deleteUsers')->name('eliminar_usuarios');


    //**almacena usuarios CAMBIAR NOMBRE DE FUNCION*/
    Route::post('/almacenaUsuarios', 'admin\CrudUserController@storeUsers')->name('almacenar_usuarios');


    //**almacena usuarios CAMBIAR NOMBRE DE FUNCION*/
    Route::post('/edicionUsuario', 'admin\CrudUserController@editeUser')->name('edita_usuario');


    Route::post('/ajaxQR', 'QrController@read')->name('ajaxQR');


    //**almacena usuarios CAMBIAR NOMBRE DE FUNCION*/
    Route::post('/editaUsuarios', 'admin\CrudUserController@editUsers')->name('editar_usuarios');

    //**el jquery se encarga de traer de getUser las variables a mostrar */
    Route::get('/dtbl.users', 'admin\CrudUserController@getUsers')->name('datatable.users');
    
    //**genera el pdf en base a la vista reporteUsuario.blade */
    Route::get('/pdf.users', 'admin\CrudUserController@pdfUsers')->name('pdf.users');

    /**genera el excel en base al modelo User */
    Route::get('/xlsx.users', 'admin\CrudUserController@xlsxExport')->name('xlsx.users');

    //**RECEPCION */
    Route::get('scanner', function () {
        return view('estacionapp.session.recepcion.lectorQr');
    })->name('scanner');
});
