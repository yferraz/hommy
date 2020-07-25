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
Route::post('createRepublic', 'RepublicController@createRepublic');
Route::get('showRepublic/{id}', 'RepublicController@showRepublic');
Route::get('listRepublic', 'RepublicController@listRepublic');
Route::put('updateRepublic/{id}', 'RepublicController@updateRepublic');
Route::delete('deleteRepublic/{id}', 'RepublicController@deleteRepublic');

Route::put('addUser/{id}/{user_id}', 'RepublicController@addUser');
Route::put('removeUser/{id}/{user_id}', 'RepublicController@removeUser');

Route::post('createUser', 'UserController@createUser');
Route::get('showUser/{id}', 'UserController@showUser');
Route::get('listUser', 'UserController@listUser');
Route::put('updateUser/{id}', 'UserController@updateUser');
Route::delete('deleteUser/{id}', 'UserController@deleteUser');

Route::post('createBedroom', 'BedroomController@createBedroom');
Route::get('showBedroom/{id}', 'BedroomController@showBedroom');
Route::get('listBedroom', 'BedroomController@listBedroom');
Route::put('updateBedroom/{id}', 'BedroomController@updateBedroom');
Route::delete('deleteBedroom/{id}', 'BedroomController@deleteBedroom');

Route::put('addRepublic/{id}/{republic_id}', 'BedroomController@addRepublic');
Route::put('removeRepublic/{id}/{republic_id}', 'BedroomController@removeRepublic');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
