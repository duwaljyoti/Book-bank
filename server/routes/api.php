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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'authenticate_token'], function(){
    Route::post('book', 'API\BookController@create')->name('book_create');
    Route::post('request', 'API\RequestController@create')->name('request_create');
    Route::post('borrow/rent', 'API\BookController@borrowCreate');
});


Route::get('books','API\BookController@bookListApi')->name('get_book_name');
Route::get('categories','API\CategoryController@CategoryApi')->name('get_category');
Route::get('user/{user_id}/other-books/{book_id}', 'API\BookController@otherBookList')
    ->name('other_book_list');


Route::get('request-book','API\RequestController@bookRequest')->name('get_book_request');
//Route::post('filter-book','API\BookListController@filterBook')->name('filter_book_list');

Route::post('users', 'API\UserController@create')->name('user_create');
Route::get('users/{email}', 'API\UserController@userDetailsByEmail')
    ->name('user_details');