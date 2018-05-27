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
    return redirect("/login");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'login'],function(){
		Route::get('login', 'Auth\AuthAdmin@showLoginForm')->name('admin.login');
        Route::post('login', 'Auth\AuthAdmin@login')->name('admin.authentication');
        Route::post('logout', 'Auth\AuthAdmin@logout')->name('admin.logout');
        

        Route::get('register', 'AuthAdmin\RegisterController@showRegistrationForm')->name('admin.register');
        Route::post('register', 'AuthAdmin\RegisterController@register')->name('admin.signin');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});
Route::prefix('admin')->group(function(){
	Route::middleware('auth')->group(function(){
		Route::get('dashboard','admins\AdminController@index')->name('dashboard');

		Route::get('Posts','admins\PostController@index')->name('posts.index');
		Route::delete('Posts/{id}','admins\PostController@destroy');
		Route::put('Posts/{id}','admins\PostController@update');
		Route::post('Posts/store','admins\PostController@store')->name('Posts.store');

		Route::get('Tags','admins\TagController@index')->name('tags.index');
		Route::delete('Tags/{id}','admins\TagController@destroy');
		Route::put('Tags/{id}','admins\TagController@update');
		Route::post('Tags/store','admins\TagController@store')->name('Tags.store');

		Route::get('Categories','admins\CategoryController@index')->name('cates.index');
		Route::delete('Cates/{id}','admins\CategoryController@destroy');
		Route::put('Cates/{id}','admins\CategoryController@update');
		Route::post('Cates/store','admins\CategoryController@store')->name('Cates.store');		
	});
});

Route::get('blog','blogs\BlogController@index')->name('blog');


Route::get('post_detail/{slug}','blogs\BlogController@showDetail')->name('post_detail');




