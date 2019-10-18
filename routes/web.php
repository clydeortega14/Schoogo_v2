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

Route::get('view/{id}', 'LandingPageController@view');

Auth::routes();

Route::middleware(['auth'])->group(function(){

	Route::get('/home', 'HomeController@index')->name('home');

	//FILES
	Route::get('view/file/{id}', 'RequestFilesController@show')->name('view.file');
	Route::get('download/{id}', 'RequestFilesController@download')->name('download.file');

});
