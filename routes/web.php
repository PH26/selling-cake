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
    return view('welcome');
});

//Route for admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::group(['prefix' => 'user'], function(){

		Route::get('index', 'UsersController@index');

		Route::get('add', 'UsersController@create');
		Route::post('add', 'UsersController@store');

		Route::get('edit/{id}', 'UsersController@edit');
		Route::post('edit/{id}', 'UsersController@update');

		Route::get('delete/{id}', 'UsersController@destroy');
	});

	Route::group(['prefix' => 'category'], function(){

		Route::get('index', 'CategoriesController@index');

		Route::get('add', 'CategoriesController@create');
		Route::post('add', 'CategoriesController@store');

		Route::get('edit/{id}', 'CategoriesController@edit');
		Route::post('edit/{id}', 'CategoriesController@update');

		Route::get('delete/{id}', 'CategoriesController@destroy');
	});
	Route::group(['prefix' => 'product'], function(){

		Route::get('index', 'ProductsController@index');

		Route::get('add', 'ProductsController@create');
		Route::post('add', 'ProductsController@store');

		Route::get('edit/{id}', 'ProductsController@edit');
		Route::post('edit/{id}', 'ProductsController@update');

		Route::get('delete/{id}', 'ProductsController@destroy');
	});
	Route::group(['prefix' => 'slide'], function(){

		Route::get('index', 'SlideController@index');

		Route::get('add', 'SlideController@create');
		Route::post('add', 'SlideController@store');

		Route::get('edit/{id}', 'SlideController@edit');
		Route::post('edit/{id}', 'SlideController@update');

		Route::get('delete/{id}', 'SlideController@destroy');
	});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Login/Logout
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
// // Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset');
