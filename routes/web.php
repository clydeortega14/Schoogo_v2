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
Route::get('/about-us', 'LandingPageController@about');
Route::get('/display-product/{id}', 'LandingPageController@viewProduct')->name('view.product');

Auth::routes();

Route::middleware(['auth'])->group(function(){

	Route::get('/home', 'HomeController@index')->name('home');
	//PRODUCTS
	Route::resource('products', 'ProductsController');

	//FILES
	// Route::resource('request-files', 'RequestFilesController');
	
	// Route::get('view/{id}', 'RequestFilesController@edit')->name('view');
	// Route::get('print/file/{id}', 'RequestFilesController@show')->name('print.file');
	// Route::get('download/file/{id}', 'RequestFilesController@download')->name('download.file');
	// Route::put('compute/request/{id}', 'RequestFilesController@update')->name('compute.request.price');
	// Route::put('update/doc/status/{id}', 'RequestFilesController@updateDocStatus')->name('update.doc.status');

});

/* AJAX */
Route::get('pricing/{size}/{quantity}', 'LandingPageController@getPrice');
