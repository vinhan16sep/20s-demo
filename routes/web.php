<?php

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
    return view('home');
})->name('homepage');

Auth::routes();

Route::get('/home', 'HomeController@index');

// Brand login
Route::prefix('brand')->group(function(){
    Route::get('/login', 'Auth\LoginController@showBrandLoginForm')->name('brand.login');
    Route::post('/login', 'Auth\LoginController@brandLogin')->name('brand.login.submit');
    Route::get('/', 'BrandController@index')->name('brand.dashboard');

    Route::get('/register', 'Auth\RegisterController@showBrandRegisterForm')->name('brand.register');
    Route::post('/register', 'Auth\RegisterController@brandRegister')->name('brand.register.submit');
});

// Publisher login
Route::prefix('publisher')->group(function(){
    Route::get('/login', 'Auth\LoginController@showPublisherLoginForm')->name('publisher.login');
    Route::post('/login', 'Auth\LoginController@publisherLogin')->name('publisher.login.submit');
    Route::get('/', 'PublisherController@index')->name('publisher.dashboard');

    Route::get('/register', 'Auth\RegisterController@showPublisherRegisterForm')->name('publisher.register');
    Route::post('/register', 'Auth\RegisterController@publisherRegister')->name('publisher.register.submit');
});

Route::prefix('end_user')->group(function(){
    Route::get('/login', 'Auth\LoginController@showEndUserLoginForm')->name('end_user.login');
    Route::post('/login', 'Auth\LoginController@endUserLogin')->name('end_user.login.submit');
    Route::get('/', 'EndUserController@index')->name('end_user.dashboard');

    Route::get('/register', 'Auth\RegisterController@showEndUserRegisterForm')->name('end_user.register');
    Route::post('/register', 'Auth\RegisterController@endUserRegister')->name('end_user.register.submit');
});


Route::prefix('20s-admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});



