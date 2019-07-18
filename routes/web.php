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


    Route::get('/administracion', 'admin\AdminController@index')->name('administracion');
    
    //**muestra listado usuarios */
    Route::get('/listadoUsuarios', 'admin\CrudUserController@index')->name('listado_usuarios');

    //** MUESTRA formulario agregar usuarios CAMBIAR NOMBRE DE FUNCION */
    Route::get('/agregarUsuarios', 'admin\CrudUserController@formAgregarUsuario')->name('agregar_usuarios');

    //**ELIMINA USUARIO*/
<<<<<<< HEAD
    Route::post('/eliminaUsuarios', 'admin\CrudUserController@deleteUsers')->name('eliminar_usuarios');
=======
    Route::post('/eliminaUsuarios', 'admin\CrudUserController@deleteUsers')->name('eliminar_usuarios'); 
>>>>>>> 2f8ff5a7fabe68f37328602b6c060bec2be5f734


    //**almacena usuarios CAMBIAR NOMBRE DE FUNCION*/
    Route::post('/almacenaUsuarios', 'admin\CrudUserController@storeUsers')->name('almacenar_usuarios');


    //**almacena usuarios CAMBIAR NOMBRE DE FUNCION*/
    Route::post('/edicionUsuario', 'admin\CrudUserController@editeUser')->name('edita_usuario');

 
    Route::get('/lala','reserves\ExpressController@validates');

    Route::post('/ajaxQR','QrController@read')->name('ajaxQR');



    //**RECEPCION */
    Route::get('/qread', 'ReadqrController@read');
    Route::get('scanner', function () {
        return view('estacionapp.session.recepcion.lectorQr');
    })->name('scanner');
});

Auth::routes(['verify' => true]);
