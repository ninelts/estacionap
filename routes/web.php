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
Route::get('/', function () {return view('estacionapp.inicio');})->name('inicio')->middleware('guest');
Route::get('/registro', 'Auth\RegisterController@index')->name('registro');
Route::get('login', function () {return view('estacionapp.login');})->name('login')->middleware('guest');



/*RUTAS CON SESSION*/
Route::get('/roles', 'RolesController@index')->name('roles')->middleware(['verify' => true]);

Route::get('/conductor', 'conductorController@index')->name('conductor');
Route::get('/recepcion', 'RecepcionController@index')->name('recepcion');


	Route::get('/administracion', 'AdministracionController@index')->name('administracion'); //**Carga la vista administrador */
    Route::get('/dtbl.users', 'AdministracionController@getUsers')->name('datatable.users');//**el jquery se encarga de traer de getUser las variables a mostrar */
    Route::get('/pdf.users','AdministracionController@pdfUsers')->name('pdf.users'); //**genera el pdf en base a la vista reporteUsuario.blade */
    Route::get('/xlsx.users','AdministracionController@xlsxExport')->name('xlsx.users'); /**genera el excel en base al modelo User */
//RUTAS PRUEBAS

    Route::get('reserva', function() {return view('estacionapp.session.conductor.generarReserva');})->name('reserva'); 
    Route::get('/admin', function() {return view('estacionapp.administrador.administrador');})->name('admin'); 
    Route::get('/misreservas', function() {return view('estacionapp.session.conductor.misReservas');})->name('misreservas'); 

    Route::get('/qread','ReadqrController@read');

    /*RESERVA EXPRESS*/
    Route::get('/express', 'reserves\ExpressController@create')->name('express');

    /*RESERVA DIARIA*/

    Route::get('/diaria','reserves\DayliController@index')->name('vdiaria');
    Route::post('/diarias/', 'reserves\DayliController@create')->name('cdiaria');

    /*RESERVA MENSUAL*/
    Route::get('/mensual', 'reserves\mensualController@index')->name('mensual');


    /*RUTAS--CON--SESSION*/

