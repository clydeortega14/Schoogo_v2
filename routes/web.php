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

// FOR GUEST
Route::get('/display-product/{id}', 'LandingPageController@viewProduct')->name('display.product');
Route::get('/product-categories/{prodId}', 'LandingPageController@productCategories')->name('product.categories');
Route::get('/price-calculation/{prodId}/{categoryId}', 'LandingPageController@priceCalculation')->name('price.calculation');
Route::get('/upload-design/', 'LandingPageController@uploadDesign')->name('upload.design');
Route::post('/checkout', 'LandingPageController@checkout')->name('checkout');
// Route::get('/product-options', 'LandingPageController@productOptions')->name('product.options');
Route::get('/order-checkout', 'OrderProductController@checkout')->name('order.checkout');
Route::post('/order-now/{id}', 'OrderProductController@orderNow')->name('order.now');


Auth::routes();

Route::middleware(['auth'])->group(function(){

	Route::get('/home', 'HomeController@index')->name('home');
	/* PRODUCTS ROUTE */
	Route::resource('products', 'ProductsController');
	/* CATEGORIES ROUTE*/
	Route::resource('categories', 'CategoriesController');
	Route::put('/update-status/{id}', 'CategoriesController@updateStatus')->name('update.status');
	/* PRICING ROUTE */
	Route::resource('pricings', 'PricingController');
	/* Papers Route*/
	Route::resource('papers', 'PapersController');
	/*Orders Route*/
	Route::resource('orders', 'OrdersController');

	Route::resource('size', 'SizesController');

});

/* AJAX */
Route::get('pricing/{size}/{quantity}', 'LandingPageController@getPrice');
Route::post('update/size/{id}', 'SizesController@updateSize');




//FILES
// Route::resource('request-files', 'RequestFilesController');

// Route::get('view/{id}', 'RequestFilesController@edit')->name('view');
// Route::get('print/file/{id}', 'RequestFilesController@show')->name('print.file');
// Route::get('download/file/{id}', 'RequestFilesController@download')->name('download.file');
// Route::put('compute/request/{id}', 'RequestFilesController@update')->name('compute.request.price');
// Route::put('update/doc/status/{id}', 'RequestFilesController@updateDocStatus')->name('update.doc.status');
