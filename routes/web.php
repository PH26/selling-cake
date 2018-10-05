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
//Route for frontend

Route::get('/', 'PageController@homepage');
Route::get('allproduct', 'PageController@allProduct');
Route::get('category/{id}', 'PageController@category');
Route::get('product/{id}', 'PageController@product');
//Add to cart and Order
Route::get('add-to-cart/{id}', [
			'uses' => 'PageController@getAddToCart',
			'as' => 'product.addToCart'
			]);
Route::get('delete-item-cart/{id}', [
			'uses' => 'PageController@getDeleteItemCart',
			'as' => 'product.deleteItemCart'
			]);
Route::get('viewcart', 'PageController@getViewCart');
Route::get('cart/changeQty', ['as' => 'changeQty', 'uses' => 'PageController@changeQty']);
Route::get('checkout', 'OrderController@getCheckOut');
Route::post('checkout', 'OrderController@postCheckOut');
//Management for User
Route::get('user/profile', 'PageController@userProfile');

//Route for admin
Route::group(['prefix' => 'admin'], function(){
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
	Route::group(['prefix' => 'order'], function(){

		Route::get('index', 'OrderController@index');
	});
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Login/Logout for Admin
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login');
Route::get('admin/logout', 'Auth\AdminLoginController@logout');
//Login/Logout for Normal User
Route::get('login', 'Auth\LoginController@showLoginForm')->name('page.login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
// Registration Routes...
Route::get('signup', 'Auth\RegisterController@showRegistrationForm');
Route::post('signup', 'Auth\RegisterController@register');
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');


Route::get('contact', 'PageController@getContact')->name('contact');
Route::post('contact', 'PageController@postContact')->name('contact');
