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
Route::get('/', function () {return view('estacionapp.inicio');})->name('inicio')->middleware('guest');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registro','Auth\RegisterController@index')->name('registro');
Route::get('/conductor','conductorController@index')->name('conductor');
Route::get('/Qr', 'conductorController@QR')->name('QR');
Route::get('/Roles', 'RolesController@index')->name('roles');
Route::get('/Recepcion', 'RecepcionController@index')->name('recepcion');

//RUTAS PRUEBAS

Route::get('login', function() {
    return view('estacionapp.login');
})->name('login')->middleware('guest');  
Route::get('reserva', function() {
    return view('estacionapp.session.conductor.generarReserva');
})->name('reserva'); 