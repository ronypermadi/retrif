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

Route::group(['prefix' => 'member', 'namespace' => 'front'], function() {
    Route::get('login', 'LoginController@loginForm')->name('customer.login');
    Route::post('login', 'LoginController@login')->name('customer.post_login');
    Route::get('verify/{token}', 'FrontController@verifyCustomerRegistration')->name('customer.verify');

    Route::group(['middleware' => 'customer'], function() {
        Route::get('dashboard', 'LoginController@dashboard')->name('customer.dashboard');
        Route::get('logout', 'LoginController@logout')->name('customer.logout');
        Route::get('orders', 'OrderController@index')->name('customer.orders');
        Route::get('orders/{invoice}', 'OrderController@view')->name('customer.view_order');
        Route::get('payment', 'OrderController@paymentForm')->name('customer.paymentForm');
        Route::post('payment', 'OrderController@storePayment')->name('customer.savePayment');
        Route::get('setting', 'FrontController@customerSettingForm')->name('customer.settingForm');
        Route::post('setting', 'FrontController@customerUpdateProfile')->name('customer.setting');
    });

});