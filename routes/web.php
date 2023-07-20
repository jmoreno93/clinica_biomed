<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::group(['namespace' => 'App\Http\Controllers', 'as' => 'web.'], function () {
    Route::get('/paciente', 'PacienteController@index');
    Route::post('/paciente', 'PacienteController@save');

    Route::get('/doctor', 'DoctorController@index');
    Route::post('/doctor', 'DoctorController@save');

    Route::get('/cita', 'CitaController@index');
    Route::post('/cita', 'CitaController@save');

    Route::get('/diagnostico', 'DiagnosticoController@index');
    Route::post('/diagnostico', 'DiagnosticoController@save');

    Route::get('/resultado', 'ResultadoController@index');
});

