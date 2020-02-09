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

Route::get('/', 'LandingPageController@index')->name('home');
Route::get('/products', 'ShopController@index')->name('shop.index');
Route::get('/products/{product}', 'ShopController@show')->name('shop.show');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart', 'CartController@destroyAll')->name('cart.destroyAll');
Route::patch('/cart/{product}', 'CartController@update')->name('store.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');

Route::post('/cart/save-for-later/{product}', 'CartController@switchToSaveForLater')->name('cart.saveForLater');
Route::post('/cart/switch-to-cart/{product}', 'CartController@switchToCart')->name('cart.switchToCart');
Route::delete('/save-for-later/{product}', 'CartController@destroySavedForLater')->name('cart.destroySavedForLater');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::post('checkout/discount_coupon', 'CouponController@store')->name('coupon.store');
Route::delete('checkout/discount_coupon', 'CouponController@destroy')->name('coupon.destroy');

Route::get('/confirmation', 'ConfirmationController@index')->name('confirmation.index');

Route::get('empty', function() {
  Cart::destroy();
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
