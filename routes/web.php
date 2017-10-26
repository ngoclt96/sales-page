<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


/**
 * -----------------------------------------
 * use login, resgiter, reset password User
 * ----------------------------------------
 */
Route::group(['middleware' => 'user_guest'], function () {
    //login and register
    Route::get('user/login', 'Auth\Users\LoginController@showLoginForm')->name('user.login.form');
    Route::post('user/login', 'Auth\Users\LoginController@login')->name('user.login');
    //reset password to email
    Route::get('user/password/reset', 'Auth\Users\ForgotPasswordController@showLinkRequestForm');
    Route::post('user/password/email', 'Auth\Users\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
    Route::get('user/password/reset/{token}', 'Auth\Users\ResetPasswordController@showResetForm');
    Route::post('user/password/reset', 'Auth\Users\ResetPasswordController@reset')->name('user.password.reset');
});

/**
 * -----------------------------------------
 * use index, logout User
 * ----------------------------------------
 */
Route::get('/', 'HomeController@index')->name('home.index');
Route::post('user/logout', 'Auth\Users\LoginController@logout')->name('login.logout');

Route::get('categories', 'CategoriesController@index')->name('categories.index');
Route::get('categories/form', 'CategoriesController@form')->name('categories.form');
Route::get('categories/form/{id}', 'CategoriesController@form')->name('categories.edit');
Route::post('categories/confirm', 'CategoriesController@confirm')->name('categories.confirm');
Route::get('categories/complete', 'CategoriesController@complete')->name('categories.complete');
Route::post('categories/delete', 'CategoriesController@delete')->name('categories.delete');
Route::post('categories/setting', 'CategoriesController@setting')->name('categories.setting');