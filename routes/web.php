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
Route::get('/qr', 'QrController@create')->name('QR');
Route::get('/recepcion', 'RecepcionController@index')->name('recepcion');
    

/*RESERVA EXPRESS*/
Route::get('/express', 'reserves\ExpressController@create')->name('express');

/*RESERVA DIARIA*/

Route::get('/diaria','reserves\DayliController@index')->name('vdiaria');
Route::post('/diarias/', 'reserves\DayliController@create')->name('cdiaria');

/*RESERVA MENSUAL*/
Route::get('/mensual', 'reserves\mensualController@index')->name('mensual');


/*RUTAS--CON--SESSION*/