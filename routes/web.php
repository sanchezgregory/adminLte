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

Route::get('/home', function() {
return view('home');
});
*/

//Auth::routes();  // rout por defecto


Route::group(['middleware' => ['web']], function(){

    Route::get('/login', function() {

        return view('login');
    });
    Route::get('/',function() {
        if (auth()->check()) return view('/home');
        else return view('auth/login');
    })->name('home');


    // Authentication Routes...
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login')->name('login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');
    $this->get('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');

});

// -------Rutas para todos los usuario autenticados....................................................
Route::group(['middleware' => 'auth'], function() {
   Route::get('account', function() {
       return view('account');
   });

    Route::get('/home',function() {
        return view('/home');
    })->name('home');

    Route::get('account.password','AccountController@getPassword')->name('getPassword');
    Route::post('account.password', 'AccountController@postPassword')->name('postPassword');

    Route::get('account.edit-profile','AccountController@editProfile')->name('editProfile');
    Route::put('account.edit-profile','AccountController@updateProfile')->name('updateProfile');

    // ---------------Rutas solo para el admin..................................................
    Route::group(['middleware' => 'role:admin'], function(){
        Route::get('admin.settings', function(){
            return view('admin.settings');
        });
    });
});