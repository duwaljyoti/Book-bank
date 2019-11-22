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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Route::get('admin', function () {
    return view('admin_template');
});*/

Route::get('test_layout', function () {
    return view('layout');
});

/*Route::group(['namespace'=>'Book','prefix'=>'admin','middleware'=>'auth'], function () {
    Route::get('books', 'BookController@index');
});
Route::group(['namespace'=>'User','prefix'=>'admin','middleware'=>'auth'], function () {
    Route::get('users', 'UserController@index');
});*/
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth'], function () {

    Route::get('books', 'BookController@index');
    Route::get('users', 'UserController@index');

    Route::get('mass_requests', 'RequestController@massRequests');
    Route::get('personal_requests', 'RequestController@personalRequests');
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::resource('books','BookController');
});


Route::get('admin/login','Auth\LoginController@showLoginForm')->name('login');
Route::get('admin/logout','Auth\LoginController@logout')->name('logout');
Route::post('admin/login','Auth\LoginController@login')->name('postLogin');
