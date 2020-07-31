<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//RepublicController
Route::post('createRepublic', 'RepublicController@createRepublic');
Route::get('showRepublic/{id}', 'RepublicController@showRepublic');
Route::get('listRepublic', 'RepublicController@listRepublic');
Route::put('updateRepublic/{id}', 'RepublicController@updateRepublic');
Route::delete('deleteRepublic/{id}', 'RepublicController@deleteRepublic');

Route::put('addUser/{id}/{user_id}', 'RepublicController@addUser');
Route::put('removeUser/{id}/{user_id}', 'RepublicController@removeUser');

Route::put('retornarUsuarios/{id}', 'RepublicController@retornarUsuarios');

Route::put('retornarProprietario/{id}', 'RepublicController@retornarProprietario');


//UserController
Route::post('createUser', 'UserController@createUser');
Route::get('showUser/{id}', 'UserController@showUser');
Route::get('listUser', 'UserController@listUser');
Route::put('updateUser/{id}', 'UserController@updateUser');
Route::delete('deleteUser/{id}', 'UserController@deleteUser');

Route::put('alugar/{id}/{republic_id}', 'UserController@alugar');
Route::put('removeAluguel/{id}/{republic_id}', 'UserController@removeAluguel');

Route::put('retornarRepublica/{id}', 'UserController@retornarRepublica');

Route::put('favoritar/{id}/{republic_id}', 'UserController@favoritar');
Route::put('desfavoritar/{id}/{republic_id}', 'UserController@desfavoritar');

Route::get('listFavoritos/{id}', 'UserController@listFavoritos');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
