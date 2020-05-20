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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/cliente/create', 'ClientController@create');
Route::post('/cliente', 'ClientController@store');
Route::get('/cliente/{user}/edit', 'ClientController@edit');
Route::patch('/cliente/{user}', 'ClientController@update');
Route::get('/cliente/{user}', 'ClientController@show');
Route::get('/cliente', 'ClientController@index');
Route::delete('/cliente/{user}', 'ClientController@delete');


Route::get('/turno/{user}/create', 'TurnoController@create');
Route::post('/turno/{user}', 'TurnoController@store');
Route::get('/turno/{turno}/edit', 'TurnoController@edit');
Route::patch('/turno/{turno}', 'TurnoController@update');
Route::delete('/turno/{turno}','TurnoController@delete');
Route::get('/turno','TurnoController@index');


Route::get('/marca','MarcaController@index');
Route::get('/marca/create','MarcaController@create');
Route::post('/marca','MarcaController@store');
Route::get('/marca/{marca}/edit','MarcaController@edit');
Route::patch('/marca/{marca}','MarcaController@update');
Route::delete('/marca/{marca}','MarcaController@delete');

Route::get('/modelo','ModeloController@index');
Route::get('/modelo/create','ModeloController@create');
Route::post('/modelo','ModeloController@store');
Route::get('/modelo/{modelo}/edit','ModeloController@edit');
Route::patch('/modelo/{modelo}','ModeloController@update');
Route::delete('/modelo/{modelo}','ModeloController@delete');

Route::get('/veiculo','TipoAutoController@index');
Route::get('/veiculo/create','TipoAutoController@create');
Route::post('/veiculo','TipoAutoController@store');
Route::get('/veiculo/{veiculo}/edit','TipoAutoController@edit');
Route::patch('/veiculo/{veiculo}','TipoAutoController@update');
Route::delete('/veiculo/{veiculo}','TipoAutoController@delete');

Route::get('/lavado','TipoLavadoController@index');
Route::get('/lavado/create','TipoLavadoController@create');
Route::post('/lavado','TipoLavadoController@store');
Route::get('/lavado/{lavado}/edit','TipoLavadoController@edit');
Route::patch('/lavado/{lavado}','TipoLavadoController@update');
Route::delete('/lavado/{lavado}','TipoLavadoController@delete');

Route::get('/usuario','UsuariosController@index');
Route::get('/usuario/create','UsuariosController@create');
Route::post('/usuario','UsuariosController@store');
Route::get('/usuario/{user}/edit','UsuariosController@edit');
Route::patch('/usuario/{user}','UsuariosController@update');
Route::delete('/usuario/{user}','UsuariosController@delete');
Route::get('/usuario/{user}','UsuariosController@show');
