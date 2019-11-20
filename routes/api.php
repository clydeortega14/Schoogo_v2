<?php

use Illuminate\Http\Request;

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

Route::get('/product-categories/{id}', 'ProductsController@productCategories');
Route::get('/get-size/{product_id}/{category_id}', 'LandingPageController@getSize');
Route::get('/get-price/{size}/{quantity}', 'LandingPageController@getPrice');
Route::get('/get-quantity/{size}', 'LandingPageController@getQuantity');
