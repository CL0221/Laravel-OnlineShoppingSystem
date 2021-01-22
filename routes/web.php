<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/home');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product', 'HomeController@indexx')->name('product.indexx');

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');
Route::get('/cart', 'CartController@index')->name('cart.index')->middleware('auth');
Route::get('/cart/destroy/{itemId}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');
Route::get('/cart/update/{itemId}', 'CartController@update')->name('cart.update')->middleware('auth');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');

Route::resource('orders', 'OrderController')->middleware('auth');

Route::resource('shops','ShopController')->middleware('auth');

Route::get('paypal/checkout/{order}', 'PayPalController@getExpressCheckout')->name('paypal.checkout');
Route::get('paypal/checkout-success/{order}', 'PayPalController@getExpressCheckoutSuccess')->name('paypal.success');
Route::get('paypal/checkout-cancel', 'PayPalController@cancelPage')->name('paypal.cancel');

Route::get('/auth/google', 'GoogleController@redirectGoogle');
Route::get('/auth/google/callback', 'GoogleController@handleGoogleCallback');

Auth::routes();

Route::get('/allProducts', 'ProductController@show')->name('showProducts');
Route::get('/searchResult', 'ProductController@search')->name('search.product');
Route::get('/productDetail/{id}', 'ProductController@view')->name('viewDetail');

Route::get('/add-to-compare/{id}', 'CompareController@addToCompare')->name('compare');
Route::get('/compareIndex', 'CompareController@compareIndex')->name('compare.index');
Route::get('remove-from-compare/{id}', 'CompareController@remove')->name('removeCompare');
Route::get('/priceRange', 'ProductController@priceRange')->name('priceRange');

Route::get('/addBrand', 'BrandController@addBrand');

Route::get('/laptop', 'LaptopController@index')->name('laptop');
Route::get('/laptopDetail/{id}', 'LaptopController@viewDetail')->name('viewLaptop');
Route::get('/addLaptop/{id}', 'LaptopController@addLaptop')->name('addLaptop');
Route::get('/laptopCompare', 'LaptopController@view')->name('laptopCompare');
Route::get('/removeLaptop/{id}', 'LaptopController@remove')->name('removeLaptop');
Route::get('/cartLaptop/{laptop}', 'LaptopController@cartLaptop')->name('cartLaptop')->middleware('auth');
Route::get('/priceRange-laptop', 'LaptopController@priceRange')->name('priceRangeLaptop');

Route::get('/phone', 'PhoneController@index')->name('phones');
Route::get('/phoneDetail/{id}', 'PhoneController@viewDetail')->name('viewPhone');
Route::get('/addPhone/{id}', 'PhoneController@addPhone')->name('addPhone');
Route::get('/phoneCompare', 'PhoneController@view')->name('phoneCompare');
Route::get('removePhone/{id}', 'PhoneController@remove')->name('removePhone');
Route::get('/cartPhone/{phone}', 'PhoneController@cartPhone')->name('cartPhone');
Route::get('/priceRange-phones', 'PhoneController@priceRange')->name('priceRangePhone');

Route::get('/watch', 'WatchController@index')->name('watch');
Route::get('/watchDetail/{id}', 'WatchController@view')->name('viewWatch');
Route::get('/addWatch/{id}', 'WatchController@addWatch')->name('addWatch');
Route::get('/watchCompare', 'WatchController@watchCompareIndex')->name('watchCompare');
Route::get('/removeWatch/{id}', 'WatchController@remove')->name('removeWatch');
Route::get('/cartWatch/{watch}', 'WatchController@cartWatch')->name('cartWatch');
Route::get('/priceRange-watches', 'WatchController@priceRange')->name('priceRangeWatch');

Route::get('/tvs', 'TVController@index')->name('tv');
Route::get('/tvDetail/{id}', 'TVController@viewDetail')->name('viewTV');
Route::get('/addTv/{id}', 'TVController@addTv')->name('addTv');
Route::get('/tvCompare', 'TVController@view')->name('tvCompare');
Route::get('removeTv/{id}', 'TVController@remove')->name('removeTv');
Route::get('/cartTv/{tv}', 'TVController@cartTv')->name('cartTv');
Route::get('/priceRange-tvs', 'TVController@priceRange')->name('priceRangeTv');

Route::get('/b4', function () {
    return view('b4');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
