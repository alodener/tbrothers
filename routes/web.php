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

Auth::routes();

// Rotas Método Get 
Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/agendamento', 'AgendamentoController@iniciar')->name('agendamento');
Route::get('/listagendamento', function () { return view('listagendamento');});
Route::get('/load-events','EventController@loadEvents')->name('routeLoadEvents');

//Rotas Método Post
Route::post('/agendamento', 'AgendamentoController@novoAgendamento')->name('agendamento');
Route::post('/listagendamento', 'AgendamentoController@update')->name('routeUpdateEvents');
