<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('contatos', 'ContatoController@index');
    Route::get('contatos/{id}', 'ContatoController@show');
// Route::post('articles', 'ContatoController@store');
    // Route::put('articles/{article}', 'ContatoController@update');
    // Route::delete('articles/{article}', 'ContatoController@delete');

    Route::get('mensagems', 'MensagemController@index');
    Route::get('mensagems/{id}', 'MensagemController@show');
});
