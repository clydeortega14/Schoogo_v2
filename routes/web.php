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

Route::get('/order-checkout', 'OrderProductController@checkout')->middleware('auth')->name('order.checkout');

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
	/* Size Route */
	Route::resource('size', 'SizesController');
	/* VIEW IMAGE*/
	Route::get('/view-file/{id}', 'OrdersController@viewFile')->name('view.file');
	Route::get('/download-file/{id}', 'OrdersController@downloadFile')->name('download.file');

});
