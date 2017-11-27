<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get("/", 'ProdutoController@lista');
Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/store', 'ProdutoController@store');
Route::get('/produtos/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');
Route::get('/produtos/formulario', 'ProdutoController@formulario');
Route::post('/produtos/novo', 'ProdutoController@novo');
Route::post('/produtos/atualiza', 'ProdutoController@atualiza');
Route::get('/produtos/remove/{id}', 'ProdutoController@remove');
Route::get('/produtos/listaJson', 'ProdutoController@listaJson');
Route::get('/produtos', 'ProdutoController@lista');
Route::get('/login', 'LoginController@login');
// outras rotas omitidas

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);





