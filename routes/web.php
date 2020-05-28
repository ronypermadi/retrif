<?php

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

Route::get('/', 'front\FrontController@index')->name('front.index');
Route::get('/product', 'front\FrontController@product')->name('front.product');
Route::get('/category/{slug}', 'front\FrontController@categoryProduct')->name('front.category');
Route::get('/product/{slug}', 'front\FrontController@show')->name('front.show_product');
Route::post('cart', 'front\CartController@addToCart')->name('front.cart');
Route::get('/cart', 'front\CartController@listCart')->name('front.list_cart');
Route::post('/cart/update', 'front\CartController@updateCart')->name('front.update_cart');
Route::get('/checkout', 'front\CartController@checkout')->name('front.checkout');
Route::post('/checkout', 'front\CartController@processCheckout')->name('front.store_checkout');
Route::get('/checkout/{invoice}', 'front\CartController@checkoutFinish')->name('front.finish_checkout');

Auth::routes();

//JADI INI GROUPING ROUTE, SEHINGGA SEMUA ROUTE YANG ADA DIDALAMNYA
//SECARA OTOMATIS AKAN DIAWALI DENGAN administrator
//CONTOH: /administrator/category ATAU /administrator/product, DAN SEBAGAINYA
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    Route::get('/', 'back\HomeController@index')->name('home'); //JADI ROUTING INI SUDAH ADA DARI ARTIKEL SEBELUMNYA TAPI KITA PINDAHKAN KEDALAM GROUPING

    Route::resource('category', 'back\CategoryController')->except(['create', 'show']);
    Route::resource('product', 'back\ProductController')->except(['show']);
    Route::get('/product/bulk', 'back\ProductController@massUploadForm')->name('product.bulk');
    Route::post('/product/bulk', 'back\ProductController@massUpload')->name('product.saveBulk');
});