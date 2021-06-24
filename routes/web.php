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


//ログイン画面
Auth::routes();

//検索画面
Route::get('/book', 'BookController@index');

//画像アップロード
Route::get('/form', [App\Http\Controllers\UploadImageController::class, "show"])->name("upload_form");
Route::post('/upload', 
	[App\Http\Controllers\UploadImageController::class, "upload"]
	)->name("upload_image");
Route::get('/list', 
	[App\Http\Controllers\ImageListController::class, "show"]
	)->name("image_list");
	
Auth::routes();

Route::get('/', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::put('/posts/{post}', 'PostController@update');
Route::delete('/posts/{post}', 'PostController@destroy');
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');