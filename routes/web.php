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


// Route::get('/', function () {
//     return view('welcome');
// });

Route::group([], function(){
    Route::get('/login','LoginController@login')->name('login');
    Route::post('/logar','LoginController@logar')->name('login-liberado');
    Route::get('/registrar','RegistrarController@registrar')->name('registrar');
    Route::post('/autenticar','RegistrarController@autenticar')->name('salvar-registro');
});

// Route::fallback(function(){
//     return redirect()->route('login');
// });