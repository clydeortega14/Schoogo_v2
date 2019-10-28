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

Route::get('/', 'LandingPageController@index');

Route::resource('request-files', 'RequestFilesController');

// Route::get('view/{id}', 'LandingPageController@view');

Auth::routes();

Route::middleware(['auth'])->group(function(){

	Route::get('/home', 'HomeController@index')->name('home');
	
	
	//FILES
	Route::get('files', 'RequestFilesController@index')->name('files');
	Route::get('view/{id}', 'RequestFilesController@edit')->name('view');
	Route::get('print/file/{id}', 'RequestFilesController@show')->name('print.file');
	Route::get('download/file/{id}', 'RequestFilesController@download')->name('download.file');
	Route::put('compute/request/{id}', 'RequestFilesController@update')->name('compute.request.price');

});
