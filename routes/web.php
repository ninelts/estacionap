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
Route::get('/registro', 'Auth\RegisterController@index')->name('registro');
Route::get('/conductor', 'conductorController@index')->name('conductor');
Route::get('/qr', 'QrController@create')->name('QR');
Route::get('/roles', 'RolesController@index')->name('roles')->middleware(['verify' => true]);
Route::get('/recepcion', 'RecepcionController@index')->name('recepcion');

Route::get('/diaria', function () {return view('estacionapp.session.conductor.diaria');})->name('diaria');
Route::get('/diarias/', 'ReservasController@daily')->name('diariacontroller');
Route::get('/confdiaria', 'RegistroDiariaController@create')->name('confdiaria');
Route::get('/express', 'ReservasController@express')->name('registro_express');
Route::get('/mensual', 'mensualController@index')->name('mensual');
//RUTAS PRUEBAS

Route::get('login', function () {
    return view('estacionapp.login');
})->name('login')->middleware('guest');
