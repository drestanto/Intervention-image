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

Route::get('resizeImage', function () {
	return view('store');
});
Route::post('store', 'ImageController@store');
Route::post('resizeImagePost','ImageController@resizeImage');

Route::get('resizeImage2' function () {
	return view('resize');
});
Route::post('resizeImagePost2', 'ImageController@resizeImage2');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');