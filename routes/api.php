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


Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');


Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'Api\UserController@details');
});

// Brand Login
Route::post('brand-login', 'Api\LoginController@brandLogin');
Route::post('brand-register', 'Api\LoginController@brandRegister');
