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

Route::group([], function(){
    Route::get('/','PrincipalController@index')->name('principal');
    Route::get('/login/{msg?}','AutenticarController@login')->name('login');
    Route::post('/logar','AutenticarController@logar')->name('login-autenticado');
    Route::get('/registrar/{feedback?}','AutenticarController@registrar')->name('registrar');
    Route::post('/registro-salvo','AutenticarController@salvar')->name('registro-salvo');
});
Route::middleware(['autenticar'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('pagina-principal');
});

